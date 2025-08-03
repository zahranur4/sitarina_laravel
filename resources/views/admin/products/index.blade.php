@extends('layouts.admin')
@section('content')
<div class="container">
    <h1>Manajemen Produk</h1>
    <a href="{{ route('admin.products.create') }}" class="btn btn-primary mb-3"><i class="ri-add-line"></i> Tambah Produk</a>

    @if(session('success')) 
        <div class="alert alert-success">{{ session('success') }}</div> 
    @endif

    <table class="table table-hover align-middle">
        <thead>
            <tr>
                <th>Gambar</th>
                <th>Nama Produk</th>
                <th>Tipe</th>
                <th>Harga</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($products as $product)
            <tr>
                <td>
                    @if($product->image_path)
                        <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}" style="width: 70px; height: 70px; object-fit: cover; border-radius: 8px;">
                    @else
                        <span>No Image</span>
                    @endif
                </td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->subtitle }}</td>
                <td>Rp. {{ number_format($product->price, 0, ',', '.') }}</td>
                <td>
                    <a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-warning">Edit</a>
                    <form action="{{ route('admin.products.destroy', $product->id) }}" method="POST" class="d-inline" onsubmit="return confirm('Apakah Anda yakin ingin menghapus produk ini?');">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-sm btn-danger">Hapus</button>
                    </form>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="5" class="text-center">Belum ada produk.</td>
            </tr>
            @endforelse
        </tbody>
    </table>
</div>
@endsection