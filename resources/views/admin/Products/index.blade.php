@extends('admin.layouts.app')
@section('body')
    <!-- Include jQuery -->


    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full" data-sidebar-position="absolute"
        data-header-position="absolute" data-boxed-layout="full">
        @include('admin.layouts.nav-left')




        <div class="page-wrapper">
            <div class="container-fluid">
                <form action="{{ route('admin.product.search') }}" method="get" class="mb-3">
                    <div class="input-group">
                        <input type="text" name="search" class="form-control" placeholder="Search products">
                        <div class="input-group-append">
                            <button type="submit" class="btn btn-primary">Search</button>
                        </div>
                    </div>
                </form>
                <div class="row">
                    <div class="col-12">
                        <div class="mb-3">
                            <button type="button" class="btn btn-primary" data-toggle="modal"
                                data-target="#createProductModal">
                                Create Product
                            </button>
                            @include('admin.Products.create')
                        </div>
                        <div class="card">
                            <div class="table-responsive m-t-20" style="overflow-x: auto; max-width: 100%">
                                <table class="table table-bordered table-responsive-lg">
                                    <thead>
                                        <tr>
                                            <th scope="col">#</th>
                                            <th scope="col">Image</th>
                                            <th scope="col">NameEnglish</th>
                                            <th scope="col">DescriptionEnglish</th>
                                            <th scope="col">NameArabic</th>
                                            <th scope="col">DescriptionArabic</th>
                                            <th scope="col">Price</th>
                                            <th scope="col">Discount</th>
                                            <th scope="col">Price_After_Discount</th>
                                            <th scope="col">Quantity</th>
                                            <th scope="col">type</th>
                                            <th scope="col">filter</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($products as $product)
                                            <tr style="font-size: 12px">
                                                <th scope="row">{{ $product->id }}</th>
                                                <td><img style="width: 50px; height: 30px;  border-radius: 10px"
                                                        src="{{ asset('products/images/' . $product->image) }}"
                                                        alt=""></td>
                                                <td>{{ $product->name }}</td>
                                                <td>{{ $product->description }}</td>
                                                <td>{{ $product->namear }}</td>
                                                <td>{{ $product->descriptionar }}</td>
                                                <td>${{ $product->price }}</td>
                                                <td>${{ $product->discount }}</td>
                                                <td>${{ $product->price_after_discount }}</td>
                                                <td>{{ $product->quantity }}</td>
                                                <td>{{ $product->typegame->name }}</td>
                                                <td>{{ $product->filtergame->data_filter }}</td>
                                                <td>
                                                    <button type="button" class="btn btn-primary" data-toggle="modal"
                                                        data-target="#editUserModal-{{ $product->id }}">
                                                        Edit
                                                    </button>
                                                </td>
                                            </tr>
                                            @include('admin.Products.update')



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
