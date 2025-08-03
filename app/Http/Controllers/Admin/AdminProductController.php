<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use Illuminate\Support\Facades\Storage;

class AdminProductController extends Controller
{
    // Menampilkan daftar semua produk
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
    }

    public function create()
    {
        return view('admin.products.create');
    }

public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
            'price' => 'required|integer|min:0',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // Simpan gambar dan dapatkan path-nya
        $path = $request->file('image')->store('products', 'public');
        $validated['image_path'] = $path;
        
        // Hapus 'image' dari array karena tidak ada di tabel database
        unset($validated['image']);

        Product::create($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil ditambahkan!');
    }
    
    // Menampilkan form untuk mengedit produk
    public function edit(Product $product)
    {
        return view('admin.products.edit', compact('product'));
    }

    // Memproses update harga
    public function update(Request $request, Product $product)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',      
            'subtitle' => 'required|string|max:255', 
            'price' => 'required|integer|min:0',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if ($request->hasFile('image')) {
        
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }
        $path = $request->file('image')->store('products', 'public');
        
        $validated['image_path'] = $path;
        }
    
        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil diperbarui!');
    }

    public function destroy(Product $product)
    {
        // Hapus gambar dari storage jika ada
        if ($product->image_path) {
            Storage::disk('public')->delete($product->image_path);
        }

        // Hapus data produk dari database
        $product->delete();

        return redirect()->route('admin.products.index')->with('success', 'Produk berhasil dihapus!');
    }
}