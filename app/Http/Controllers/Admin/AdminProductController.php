<?php
namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;

class AdminProductController extends Controller
{
    // Menampilkan daftar semua produk
    public function index()
    {
        $products = Product::all();
        return view('admin.products.index', compact('products'));
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
            'price' => 'required|integer|min:0',
        ]);

        $product->update($validated);

        return redirect()->route('admin.products.index')->with('success', 'Harga berhasil diperbarui!');
    }
}