@extends('layouts.app')

{{-- Customize layout sections --}}

@section('subtitle', 'Welcome')
@section('content_header_title', 'Home')
@section('content_header_subtitle', 'Welcome')

{{-- Content body: main page content --}}

@section('content_body')
    <div class="welcome-section">
        <p class="welcome-text">Hai, Selamat Datang!</p>

        <!-- Button and table for data input 
        <button class="btn btn-custom mb-3">+ Input Data</button>

        <div class="tblwrapper">
            <table class="table table-custom">
                <thead>
                    <tr>
                        <th>Numb</th>
                        <th>Data</th>
                        <th>Options</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>1</td>
                        <td>Sample Data 1</td>
                        <td>
                            <button class="btn btn-primary btn-sm">Edit</button>
                            <button class="btn btn-danger btn-sm">Delete</button>
                        </td>
                    </tr>
                    <!-- Add more rows as needed -->
                </tbody>
            </table>
        </div>
    </div>
@stop

{{-- Push extra CSS --}}

@push('css')
    <style>
        /* Custom Background and Text Styling */
        .welcome-section {
            background-color: #f4f6f9;
            padding: 20px;
            border-radius: 8px;
        }

        .welcome-text {
            font-size: 24px;
            font-weight: bold;
            color: #4a4a4a;
            text-align: center;
            margin-bottom: 20px;
        }

        /* Button Styling 
        .btn-custom {
            background-color: #007bff;
            color: #fff;
            border-radius: 4px;
            padding: 8px 12px;
            font-size: 16px;
            transition: background-color 0.3s ease;
        }

        .btn-custom:hover {
            background-color: #0056b3;
            color: #fff;
        }

        /* Table Styling */
        .table-custom {
            width: 100%;
            border-collapse: collapse;
            margin-top: 15px;
        }

        .table-custom thead {
            background-color: #007bff;
            color: #fff;
        }

        .table-custom th, .table-custom td {
            padding: 12px;
            text-align: left;
            border: 1px solid #ddd;
        }

        .table-custom tbody tr:nth-child(even) {
            background-color: #f9f9f9;
        }
    </style>
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@endpush
