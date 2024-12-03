@extends('user.layouts.app')

@section('body')
    <!DOCTYPE html>
    <html lang="en">

    <body>
        <div class="page-heading header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>{{ trans('messages.ourshop') }}</h3>
                        <span class="breadcrumb"><a href="{{ route('home') }}">{{ trans('messages.home') }}</a>
                            >{{ trans('messages.ourshop') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="section trending">
                <div class="container">
                    <ul class="trending-filter">
                        <li>
                            <a class="is_active" href="#!" data-filter="*">{{ trans('messages.showall') }}</a>
                        </li>
                        @forelse ($filter as $filters)
                            <li>
                                <a href="#!" data-filter=".{{ $filters->data_filter }}">
                                    @if (app()->getLocale() == 'ar')
                                        {{ $filters->namear }}
                                    @else
                                        {{ $filters->name }}
                                    @endif
                                </a>
                            </li>
                        @empty
                        @endforelse
                    </ul>
                    {{-- <div class="filter-buttons">
                        <button class="filter-button active" data-filter="all">Show All</button>
                        <button class="filter-button" data-filter="high-price">High Price</button>
                        <button class="filter-button" data-filter="low-price">Low Price</button>
                    </div> --}}
                    <style>
                        .filter-buttons {
                            text-align: center;
                            margin-bottom: 20px;
                        }

                        .filter-button {
                            background: #0071f8;
                            color: #fff;
                            border: none;
                            border-radius: 5px;
                            padding: 10px 20px;
                            cursor: pointer;
                            margin: 5px;
                            transition: background 0.3s ease;
                        }

                        .filter-button.active {
                            background: #0056b3;
                        }

                        .filter-button:hover {
                            background: #0056b3;
                        }
                    </style>

                    <div class="row trending-box">

                        @forelse ($product as $products)
                            <div
                                class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 {{ $products->filtergame->data_filter }}">
                                <div class="item">
                                    <div class="thumb">
                                        <a href="products/{{ $products->id }}"><img
                                                style="width: 300px; height: 200px;  object-fit: cover;"
                                                src="{{ asset('products/images/' . $products->image) }}"
                                                alt=""></a>
                                        @if ($products->discount > 0)
                                            <span
                                                class="price"><em>${{ $products->price }}</em>${{ $products->price_after_discount }}</span>
                                        @else
                                            <span class="price">${{ $products->price }}</span>
                                        @endif
                                    </div>
                                    <div class="down-content">
                                        <span class="category">
                                            @if (app()->getLocale() == 'ar')
                                                {{ $products->typegame->namear }}
                                            @else
                                                {{ $products->typegame->name }}
                                            @endif
                                        </span>
                                        <h4
                                            style="font-size: 14px; font-weight: bold;white-space: nowrap; overflow: hidden;">


                                            @if (app()->getLocale() == 'ar')
                                                {{ $products->namear }}
                                            @else
                                                {{ $products->name }}
                                            @endif
                                        </h4>
                                        <form class="addToCartForm" data-product-id="{{ $products->id }}">
                                            @csrf
                                            <input type="hidden" name="product_id" value="{{ $products->id }}">
                                            <input hidden type="number" class="form-control" name="quantity"
                                                aria-describedby="quantity" value="1" min="1">
                                            @if (Auth::check())
                                                <button type="submit" style="border: none; background: none; padding: 0;">
                                                    <a><i class="fa fa-shopping-bag"></i></a>
                                                </button>
                                            @else
                                                <button type="submit" style="border: none; background: none; padding: 0;">
                                                    <a href="{{ route('login') }}"><i class="fa fa-shopping-bag"></i></a>
                                                </button>
                                            @endif
                                        </form>
                                    </div>
                                </div>
                            </div>
                        @empty
                        @endforelse
                    </div>
                </div>
            </div>
        </div>
    </body>

    </html>
@endsection
