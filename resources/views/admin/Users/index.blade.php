@extends('admin.layouts.app')
@section('body')
    <!-- Include jQuery -->


    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute"
        data-header-position="absolute" data-boxed-layout="full">
        @include('admin.layouts.nav-left')

        <div class="page-wrapper">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-12">
                        {{-- <div class="mb-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#createProductModal">
                                Create Filter
                            </button>
                            @include('admin.filters.create')
                        </div> --}}
                        <div class="card">
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">UserName</th>
                                            <th scope="col">phone</th>
                                            <th scope="col">Google ID</th>
                                            <th scope="col">usertype</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($user as $users)
                                            <tr>
                                                <th scope="row">{{ $users->id }}</th>
                                                <td>{{ $users->name }}</td>
                                                <td>{{ $users->email }}</td>
                                                <td>{{ $users->username }}</td>
                                                <td>{{ $users->phone }}</td>
                                                <td>{{ $users->google_id }}</td>
                                                <td>{{ $users->UserType->name }}</td>

                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#editUserModal-{{ $users->id }}">
                                                        Edit
                                                    </button>
                                                </td>

                                            </tr>
                                            @include('admin.Users.update')

                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
