@extends('layouts.app')

{{-- Customize layout sections --}}

<!-- @section('subtitle', 'Welcome') -->
@section('content_header_title', 'DATA SISWA')
<!-- @section('content_header_subtitle', 'Welcome') -->

{{-- Content body: main page content --}}

@section('content_body')
<div>
    <button>+ Input Siswa</button>
</div>
<div class="tblwrapper">
    <table>
        <tr>
            <th>NIS</th>
            <th>Nama</th>
            <th>Kelas</th>
            <th>Aksi</th>
        </tr>
        <tr>
            <td>1</td>
            <td>Ya</td>
            <td>XII TURU</td>
            <td></td>
        </tr>
    </table>
</div>
@stop

{{-- Push extra CSS --}}

@push('css')
{{-- Add here extra stylesheets --}}
<style type="text/css">
    button {
        background-color: green;
        color: white;
        /* position: relative;
        float: right; */
        margin-bottom: 10px;
    }

    table {
        border: 1px solid black;
        border-collapse: collapse;
        width: 100%;
    }

    td,
    th {
        border: 2px solid #dddddd;
        text-align: left;
        padding: 8px;
    }
</style>
@endpush

{{-- Push extra scripts --}}

@push('js')
<script>
    console.log("Hi, I'm using the Laravel-AdminLTE package!");
</script>
@endpush