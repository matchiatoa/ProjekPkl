@extends('adminlte::page')

@section('title', 'Edit Product')

@section('content_header')
    <h1>Edit Product</h1>
@stop

@section('content')
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <div class="card">
        <div class="card-body">
            <form action="{{ route('produk.update', $produk->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="nama_product" class="form-control" value="{{ $produk->nama_product }}" required>
                </div>
                <div class="form-group">
                    <label>Barcode</label>
                    <input type="text" name="barcode" class="form-control" value="{{ $produk->barcode }}" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="kategori" class="form-control" value="{{ $produk->kategori }}" required>
                </div>
                <div class="form-group">
                    <label>Price</label>
                    <input type="text" name="harga" class="form-control" 
                           value="{{ number_format($produk->harga, 0, ',', '.') }}" 
                           required>
                </div>
                <div class="form-group">
                    <label>Stock</label>
                    <input type="number" name="stok" class="form-control" value="{{ $produk->stok }}" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="deskripsi" class="form-control">{{ $produk->deskripsi }}</textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="gambar" class="form-control">
                    @if($produk->gambar)
                        <img src="{{ Storage::url($produk->gambar) }}" alt="Product Image" width="100">
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </div>
    </div>
@stop
