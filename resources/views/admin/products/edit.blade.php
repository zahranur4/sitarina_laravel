@extends('layouts.admin')
@section('title', 'Edit Produk')
@section('content')
<div class="container">
    <h1>Edit Produk</h1>

    <form action="{{ route('admin.products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        
        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" value="{{ $product->name }}" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipe Produk</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle" value="{{ $product->subtitle }}" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="price" name="price" value="{{ $product->price }}" required>
        </div>

        <div class="mb-3">
            <label for="image" class="form-label">Ganti Gambar Produk (Opsional)</label>
            <input class="form-control" type="file" id="image" name="image">
            @if($product->image_path)
                <div class="mt-2">
                    <img src="{{ Storage::url($product->image_path) }}" alt="{{ $product->name }}" style="max-width: 150px; border-radius: 8px;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection