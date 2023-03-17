@extends('layouts.dash')
@section('title', 'User List')
@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>All Post</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('dashboard.index') }}">Dashboard</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Post
                            </li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section mt-5">
            <div class="card">
                <div class="card-header d-flex">
                    <a href="{{ route('user.create') }}" class="btn btn-primary">Create New User</a>

                </div>
                <div class="card-body ">


                    <table class="table " id="table1">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Username</th>
                                <th>Email</th>
                                <th>Total Post</th>
                                <th>Page Views</th>
                                <th>Role</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse($user as $key => $user_item)
                                <tr>
                                    <td>{{ $user_item->name }}</td>
                                    <td>{{ $user_item->username}}</td>
                                    <td>{{ $user_item->email }}</td>
                                    <td>{{ $user_item->posts->count() }}</td>
                                    <td>{{ $user_item->posts->sum('page_views') }}</td>
                                    <td>@foreach ($user_item->role as $key => $item)
                                       {{ $item->title }}
                                    @endforeach</td>
                                    <td>
                                        <a href="{{ route('user.edit', $user_item->id) }}" class="btn btn-primary">Edit</a>
                                        <form action="{{ route('user.destroy', $user_item->id) }}" method="POST"
                                            class="d-inline" id="delete-form">
                                            @csrf
                                            @method('delete')
                                            <button type="submit" class="btn btn-danger" id="delete-button">Delete</button>
                                        </form>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">No Data</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </section>
    </div>

@endsection
@push('after-styles')
    <link rel="stylesheet" href="{{ asset('/backsite/assets/extensions/simple-datatables/style.css') }}" />
    <link rel="stylesheet" href="{{ asset('/backsite/assets/css/pages/simple-datatables.css') }}" />
@endpush

@push('after-scripts')
    <script src="{{ asset('/backsite/assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>
    <script src="{{ asset('/backsite/assets/js/pages/simple-datatables.js') }}"></script>
    <script src="{{ url('https://code.jquery.com/jquery-3.6.0.min.js') }}"></script>
    <!-- Tambahkan kode JavaScript berikut pada bagian bawah halaman view -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        // Mendapatkan element tombol "Hapus"
        var deleteButton = document.getElementById("delete-button");
        // Menambahkan event listener pada tombol "Hapus"
        deleteButton.addEventListener("click", function(e) {
            // Mencegah tindakan default (pengiriman form) ketika tombol "Hapus" ditekan
            e.preventDefault();
            // Menampilkan SweetAlert
            Swal.fire({
                title: "Are you sure to delete this user?",
                text: "You won't be able to revert this!",
                icon: "warning",    
                showCancelButton: true,
                confirmButtonColor: "#d33",
                cancelButtonColor: "#3085d6",
                confirmButtonText: "Yes",
                cancelButtonText: "Cancel"
            }).then((result) => {
                // Mengirimkan form jika tombol "Ya, hapus data" ditekan
                if (result.isConfirmed) {
                    document.getElementById("delete-form").submit();
                }
            });
        });
    </script>
@endpush
