@extends('layouts.app')

{{-- Customize layout sections --}}

<!-- @section('subtitle', 'Welcome') -->
@section('content_header_title', 'Profile')
<!-- @section('content_header_subtitle', 'Welcome') -->

{{-- Content body: main page content --}}

@section('content_body')
   <h1>Welcome to my Website</h1>
@stop

{{-- Push extra CSS --}}

@push('css')
    {{-- Add here extra stylesheets --}}
    {{-- <link rel="stylesheet" href="/public/css/style.css"> --}}
@endpush

{{-- Push extra scripts --}}

@push('js')
    <script> console.log("Hi, I'm using the Laravel-AdminLTE package!"); </script>
@endpush