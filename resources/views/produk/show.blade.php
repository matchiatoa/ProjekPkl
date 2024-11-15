@extends('adminlte::page')

@section('title', 'Product Details')

@section('content')
<div class="container mt-4">
@section('content_header')
    <h1><i class="fas fa-box"></i> Details Product</h1> <!-- Replaces the default icon with a box icon -->
@endsection
    <div class="card" style="background-color: #ffff;"> <!-- Soft light blue background -->
        <div class="card-body d-flex" style="border: 1px solid #d1e7fd; border-radius: 10px;">
            <!-- Display Product Image if available -->
            <div class="mr-3">
                @if($produk->gambar)
                    <img src="{{ asset('storage/' . $produk->gambar) }}" alt="Product Image" width="200" height="200" class="img-fluid rounded mt-2">
                @else
                    <p>No image available</p>
                @endif
            </div>
            <div>
                <h3>{{ $produk->nama_product }}</h3>
                <p><strong>Barcode:</strong></p>
                <img src="data:image/png;base64,{{ $barcode_image }}" alt="Product Barcode" class="img-fluid mt-2"> <!-- Display barcode image -->
                <p>{{ $produk->barcode }}</p>
                <p><strong>Category:</strong> {{ $produk->kategori }}</p>
                <p><strong>Price:</strong> Rp {{ number_format($produk->harga, 2, ',', '.') }}</p>
                <p><strong>Stock:</strong> {{ $produk->stok }} pcs</p>
                <p><strong>Description:</strong> {{ $produk->deskripsi }}</p>
                <a href="{{ route('produk.index') }}" class="btn btn-secondary mt-3" style="background-color: #007bff; color: white; border: none;">Back to List</a> <!-- Adjust button style -->
            </div>
        </div>
    </div>
</div>
@endsection
