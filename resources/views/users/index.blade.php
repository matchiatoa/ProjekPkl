@extends('adminlte::page')

@section('title', 'List User')

@section('content_header')
    <h1 class="m-0 text-dark">List User</h1>
@stop

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body">

                    <a href="{{ route('users.create') }}" class="btn btn-primary mb-2">Tambah</a>

                    <form id="searchForm" class="form-inline mb-3" method="GET" action="{{ route('users.index') }}">
                        <input type="text" name="search" class="form-control mr-2" placeholder="Cari Nama atau Email" value="{{ request()->get('search') }}">
                        <button type="submit" class="btn btn-primary">Cari</button>
                    </form>

                    <table class="table table-hover table-bordered table-stripped" id="userTable">
                        <thead>
                            <tr>
                                <th>No.</th>
                                <th>Nama</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Opsi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($users as $key => $user)
                                <tr>
                                    <td>{{ $key+1 }}</td>
                                    <td class="user-name">{{ $user->name }}</td>
                                    <td>{{ $user->email }}</td>
                                    <td>{{ $user->role }}</td>
                                    <td>
                                        <a href="{{ route('users.show', $user) }}" class="btn btn-info btn-xs">Show</a>
                                        <a href="{{ route('users.edit', $user) }}" class="btn btn-primary btn-xs">Edit</a>
                                        {{-- Tombol Hapus --}}
                                        <form action="{{ route('users.destroy', $user) }}" method="POST" style="display:inline-block;" id="delete-user-{{ $user->id }}">
                                            @csrf
                                            @method('DELETE')
                                            <button type="button" class="btn btn-danger btn-xs" onclick="confirmDelete({{ $user->id }})">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>
@stop

@push('js')
    <!-- Tambahkan SweetAlert2 -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        $(document).ready(function() {
            // Inisialisasi DataTable
            $('#userTable').DataTable({
                "responsive": true,
                "autoWidth": false,
                "searching": true,
                "ordering": true
            });

            // Tampilkan pesan sukses jika ada di session
            @if(session('success_message'))
                Swal.fire({
                    title: 'Berhasil!',
                    text: "{{ session('success_message') }}",
                    icon: 'success',
                    confirmButtonText: 'OK'
                });
            @endif
        });

        // Fungsi untuk konfirmasi penghapusan
        function confirmDelete(userId) {
            Swal.fire({
                title: 'Apakah Anda yakin?',
                text: "Data ini akan dihapus secara permanen!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Ya, hapus!',
                cancelButtonText: 'Batal'
            }).then((result) => {
                if (result.isConfirmed) {
                    document.getElementById(`delete-user-${userId}`).submit();
                }
            });
        }
    </script>
@endpush
