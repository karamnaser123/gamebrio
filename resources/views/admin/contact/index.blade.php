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

                        <div class="card">
                            <div class="table-responsive m-t-20">
                                <table class="table table-bordered table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">firstname</th>
                                            <th scope="col">lastnamer</th>
                                            <th scope="col">email</th>
                                            <th scope="col">subject</th>
                                            <th scope="col">message</th>
                                            <th scope="col">created_at</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($contact as $conta)
                                            <tr>
                                                <th scope="row">{{ $conta->id }}</th>
                                                <td>{{ $conta->firstname }}</td>
                                                <td>{{ $conta->lastname }}</td>
                                                <td>{{ $conta->email }}</td>
                                                <td>{{ $conta->subject }}</td>
                                                <td>{{ $conta->message }}</td>
                                                <td>{{ $conta->created_at }}</td>
                                                <td>
                                                    <form action="{{ route('admin.destroy', ['id' => $conta->id]) }}"
                                                        method="post">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger"><i
                                                                class="fa fa-trash"></i></button>
                                                    </form>
                                                </td>
                                            </tr>


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
