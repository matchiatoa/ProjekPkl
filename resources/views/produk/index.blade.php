@extends('adminlte::page')

@section('title', 'Product List')

@section('content_header')
    <h1><i class="fas fa-box"></i> List Product</h1> <!-- Replaces the default icon with a box icon -->
@endsection

@section('content')
    @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif
    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <div class="card">
        <div class="card-header">
            <a href="{{ route('produk.create') }}" class="btn btn-primary">Add New Product</a>

            <!-- Barcode Input Form -->
            <form action="{{ route('scan-barcode') }}" method="POST" class="mt-2">
                @csrf
                <input type="text" name="barcode" placeholder="Scan barcode here..." class="form-control d-inline-block" style="width: auto;" required>
                <button type="submit" class="btn btn-primary">Search Product</button>
            </form>
        </div>
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Barcode</th>
                        <th>Category</th>
                        <th>Price</th>
                        <th>Stock</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($produks as $produk)
                        <tr>
                            <td>{{ $produk->id }}</td>
                            <td>{{ $produk->nama_product }}</td>
                            <td>{{ $produk->barcode }}</td>
                            <td>{{ $produk->kategori }}</td>
                            <!-- Format price with thousands separator and two decimal places -->
                            <td>Rp {{ number_format($produk->harga, 2, ',', '.') }}</td>
                            <td>{{ $produk->stok }} pcs</td>
                            <td>
                                <a href="{{ route('produk.show', $produk->id) }}" class="btn btn-info btn-sm">View</a>
                                <a href="{{ route('produk.edit', $produk->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ route('produk.destroy', $produk->id) }}" method="POST" style="display:inline-block;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Are you sure?')">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@stop
