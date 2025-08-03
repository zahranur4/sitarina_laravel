@extends('layouts.admin')
@section('title', 'Tambah Produk')
@section('content')
<div class="container">
    <h1>Tambah Produk Baru</h1>

    <form action="{{ route('admin.products.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="mb-3">
            <label for="name" class="form-label">Nama Produk</label>
            <input type="text" class="form-control" id="name" name="name" required>
        </div>
        <div class="mb-3">
            <label for="type" class="form-label">Tipe Produk</label>
            <input type="text" class="form-control" id="subtitle" name="subtitle" required>
        </div>
        <div class="mb-3">
            <label for="price" class="form-label">Harga</label>
            <input type="number" class="form-control" id="price" name="price" required>
        </div>
        <div class="mb-3">
            <label for="image" class="form-label">Gambar Produk</label>
            <input class="form-control" type="file" id="image" name="image" required>
        </div>
        
        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.products.index') }}" class="btn btn-secondary">Batal</a>
    </form>
</div>
@endsection