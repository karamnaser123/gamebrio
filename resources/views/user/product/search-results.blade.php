{{-- <div class="container">
        <h1>Search Results for: "{{ $searchKeyword }}"</h1>

        @if (count($results) > 0)
            <ul>
                @foreach ($results as $result)
                    <li>
                        <strong>Name:</strong> {{ $result->name }}<br>
                        <strong>Price:</strong> ${{ $result->price }}
                    </li>
                @endforeach
            </ul>
        @else
            <p>No results found for: "{{ $searchKeyword }}"</p>
        @endif
    </div> --}}

@extends('user.layouts.app')

@section('body')
    <!DOCTYPE html>
    <html lang="en">

    <body>
        <div class="page-heading header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>{{ trans('messages.oursearch') }}</h3>
                        <span class="breadcrumb"><a href="{{ route('home') }}">{{ trans('messages.home') }}</a> >
                            {{ trans('messages.oursearch') }}</span>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="section trending">

                <div class="container">
                    <h1>{{ trans('messages.searchresultsfor') }}: "{{ $searchKeyword }}"</h1>
                    <div class="row trending-box">
                        @if (count($results) > 0)
                            @forelse ($results as $result)
                                <div
                                    class="col-lg-3 col-md-6 align-self-center mb-30 trending-items col-md-6 {{ $result->filtergame->data_filter }}">
                                    <div class="item">
                                        <div class="thumb">

                                            <a href="products/{{ $result->id }}"><img style="width: 400px; height: 300px"
                                                    src="{{ asset('products/images/' . $result->image) }}"
                                                    alt=""></a>
                                            @if ($result->discount > 0)
                                                <span
                                                    class="price"><em>${{ $result->price }}</em>${{ $result->price_after_discount }}</span>
                                            @else
                                                <span class="price">${{ $result->price }}</span>
                                            @endif
                                        </div>
                                        <div class="down-content">
                                            @if (app()->getLocale() == 'ar')
                                                <span class="category">{{ $result->typegame->namear }}</span>
                                            @else
                                                <span class="category">{{ $result->typegame->name }}</span>
                                            @endif

                                            @if (app()->getLocale() == 'ar')
                                                <span class="category">{{ $result->namear }}</span>
                                            @else
                                                <span class="category">{{ $result->name }}</span>
                                            @endif
                                            <form class="addToCartForm" data-product-id="{{ $result->id }}">

                                                @csrf
                                                <input type="hidden" name="product_id" value="{{ $result->id }}">
                                                <input hidden type="number" class="form-control" name="quantity"
                                                    aria-describedby="quantity" value="1" min="1">
                                                @if (Auth::check())
                                                    <button type="submit"
                                                        style="border: none; background: none; padding: 0;">
                                                        <a><i class="fa fa-shopping-bag"></i></a>
                                                    </button>
                                                @else
                                                    <button type="submit"
                                                        style="border: none; background: none; padding: 0;">
                                                        <a href="{{ route('login') }}"><i
                                                                class="fa fa-shopping-bag"></i></a>
                                                    </button>
                                                @endif

                                            </form>

                                        </div>
                                    </div>
                                </div>
                            @empty
                            @endforelse
                        @else
                            <h1 style="text-align: center">{{ trans('messages.noresultfound') }}: "{{ $searchKeyword }}"
                            </h1>
                        @endif
                    </div>


                </div>
            </div>
        </div>

    </body>

    </html>
@endsection
