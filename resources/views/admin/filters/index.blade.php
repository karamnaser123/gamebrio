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
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#createProductModal">
                                Create Filter
                            </button>
                            @include('admin.filters.create')
                        </div>
                        <div class="card">
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Name English</th>
                                            <th scope="col">Data Filter English</th>
                                            <th scope="col">Name Arabic</th>
                                            <th scope="col">Data Filter Arabic</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($filters as $filter)
                                            <tr>
                                                <th scope="row">{{ $filter->id }}</th>
                                                <td>{{ $filter->name }}</td>
                                                <td>{{ $filter->data_filter }}</td>
                                                <td>{{ $filter->namear }}</td>
                                                <td>{{ $filter->data_filter_ar }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#editUserModal-{{ $filter->id }}">
                                                        Edit
                                                    </button>
                                                </td>

                                            </tr>
                                            @include('admin.filters.update')

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
