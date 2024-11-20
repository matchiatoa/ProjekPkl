@extends('adminlte::page') <!-- Make sure this matches your AdminLTE layout -->

@section('title', 'Detail User')

@section('content')
<div class="container">
    <h2 class="mt-4 mb-4">Detail User</h2>
    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <tr>
                    <th>ID</th>
                    <td>{{ $user->id }}</td>
                </tr>
                <tr>
                    <th>Name</th>
                    <td>{{ $user->name }}</td>
                </tr>
                <tr>
                    <th>Email</th>
                    <td>{{ $user->email }}</td>
                </tr>
                <tr>
                    <th>Role</th>
                    <td>{{ $user->role }}</td>
                </tr>
            </table>
            <a href="{{ route('users.index') }}" class="btn btn-secondary mt-3">Back to List</a>
            <a href="{{ route('users.edit', $user->id) }}" class="btn btn-primary mt-3">Edit User</a>
            <form action="{{ route('users.destroy', $user->id) }}" method="POST" style="display:inline;">
                @csrf
                @method('DELETE')
                <button type="submit" onclick="return confirm('Are you sure?')" class="btn btn-danger mt-3">Delete User</button>
            </form>
        </div>
    </div>
</div>
@endsection
