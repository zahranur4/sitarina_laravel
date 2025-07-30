@extends('layouts.admin')
@section('content')
<div class="container">
    <h1>Manajemen Produk</h1>
    @if(session('success')) <div class="alert alert-success">{{ session('success') }}</div> @endif
    <table class="table">
        <thead>
            <tr><th>Nama Produk</th><th>Harga</th><th>Aksi</th></tr>
        </thead>
        <tbody>
            @foreach($products as $product)
            <tr>
                <td>{{ $product->name }}</td>
                <td>Rp. {{ number_format($product->price) }}</td>
                <td><a href="{{ route('admin.products.edit', $product->id) }}" class="btn btn-sm btn-primary">Edit</a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection