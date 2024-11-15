@extends('adminlte::page')

@section('title', 'Add Product')

@section('content_header')
    <h1><i class="fas fa-box"></i> Add Product</h1> <!-- Replaces the default icon with a box icon -->
@endsection

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
            <form action="{{ route('produk.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="form-group">
                    <label>Product Name</label>
                    <input type="text" name="nama_product" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Barcode</label>
                    <input type="text" name="barcode" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Category</label>
                    <input type="text" name="kategori" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="harga">Price</label>
                    <input type="text" name="harga" id="harga" class="form-control" required placeholder="Rp 0,00">
                </div>

                <div class="form-group">
                    <label>Stock</label>
                    <input type="number" name="stok" class="form-control" required>
                </div>
                <div class="form-group">
                    <label>Description</label>
                    <textarea name="deskripsi" class="form-control"></textarea>
                </div>
                <div class="form-group">
                    <label>Image</label>
                    <input type="file" name="gambar" class="form-control">
                </div>
                <button type="submit" class="btn btn-primary">Save</button>
            </form>
        </div>
    </div>

@stop

@section('js')
<script>
    document.getElementById('harga').addEventListener('input', function (e) {
        let value = e.target.value.replace(/[^,\d]/g, ''); // Remove non-numeric characters
        let splitValue = value.split(',');
        let remainder = splitValue[0].length % 3;
        let rupiah = splitValue[0].substr(0, remainder);
        let thousandGroups = splitValue[0].substr(remainder).match(/\d{3}/g);

        if (thousandGroups) {
            let separator = remainder ? '.' : '';
            rupiah += separator + thousandGroups.join('.');
        }

        rupiah = splitValue[1] !== undefined ? rupiah + ',' + splitValue[1].slice(0, 2) : rupiah; // Limit to two decimal places
        e.target.value = 'Rp ' + rupiah;
    });
</script>
@stop
