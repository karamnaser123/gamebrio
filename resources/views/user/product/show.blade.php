@extends('user.layouts.app')

@section('body')

    <!DOCTYPE html>
    <html lang="en">


    <body>


        <div class="page-heading header-text">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <h3>
                            @if (app()->getLocale() == 'ar')
                                {{ $product->namear }}
                            @else
                                {{ $product->name }}
                            @endif
                        </h3>
                        <span class="breadcrumb"><a href="{{ route('home') }}">{{ trans('messages.home') }}</a> > <a
                                href="/product">{{ trans('messages.ourshop') }}</a> >
                            @if (app()->getLocale() == 'ar')
                                {{ $product->namear }}
                            @else
                                {{ $product->name }}
                            @endif
                        </span>
                    </div>
                </div>
            </div>
        </div>
        <style>
            @media screen and (min-width: 768px) {
                .imoge {
                    width: 500px;
                    height: 500px
                }
            }

            @media screen and (max-width: 768px) {
                .imoge {
                    width: 340px;
                    height: 340px
                }
            }
        </style>
        <div class="single-product section">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">

                        <div class="left-image">
                            <img class="imoge" src="{{ asset('products/images/' . $product->image) }}" alt="">
                        </div>
                    </div>
                    <div class="col-lg-6 align-self-center">
                        <h4>
                            @if (app()->getLocale() == 'ar')
                                {{ $product->namear }}
                            @else
                                {{ $product->name }}
                            @endif
                        </h4>

                        @if ($product->discount > 0)
                            <span class="price"><em>${{ $product->price }}</em>
                                ${{ $product->price_after_discount }}</span>
                        @else
                            <span class="price">${{ $product->price }}</span>
                        @endif
                        <p>
                            @if (app()->getLocale() == 'ar')
                                {!! $product->descriptionar !!}
                            @else
                                {!! $product->description !!}
                            @endif
                        </p>

                        <div class="quantity-info">
                            <p>{{ trans('messages.availablequantity') }}:
                                <span class="available-quantity">{{ $product->quantity }}</span>
                            </p>
                        </div>
                        <style>
                            /* Example CSS for the quantity section */
                            .quantity-info {
                                margin-top: 10px;
                                font-size: 16px;
                            }

                            .quantity-info p {
                                margin: 0;
                            }

                            .available-quantity {
                                font-weight: bold;
                                color: green;
                                /* Modify the color according to your design */
                            }

                            .quantity-input {
                                margin-top: 15px;
                            }

                            .quantity-input label {
                                font-weight: bold;
                            }

                            .quantity-input input[type="number"] {
                                width: 60px;
                                padding: 5px;
                                border: 1px solid #ccc;
                                border-radius: 4px;
                                font-size: 14px;
                                /* Add more styling as needed */
                            }
                        </style>
                        <form class="addToCartForm" data-product-id="{{ $product->id }}">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">

                            <input type="number" class="form-control" name="quantity" aria-describedby="quantity"
                                value="1" min="1" max="{{ $product->quantity }}">
                            @if (Auth::check())
                                <button type="submit"><i class="fa fa-shopping-bag"></i>
                                    {{ trans('messages.addtocart') }}</button>
                            @else
                                <button type="submit"><i class="fa fa-shopping-bag"></i><a href="{{ route('login') }}"
                                        style="color:white">
                                        {{ trans('messages.addtocart') }}</a></button>
                            @endif
                        </form>

                        <ul>
                            {{-- <li><span>Game ID:</span> COD MMII</li> --}}
                            <li><span>{{ trans('messages.genre') }}:</span>
                                @if (app()->getLocale() == 'ar')
                                    {{ $product->typegame->namear }}
                                @else
                                    {{ $product->typegame->name }}
                                @endif
                            </li>
                            {{-- <li><span>Multi-tags:</span> <a href="#">War</a>, <a href="#">Battle</a>, <a href="#">Royal</a></li> --}}
                        </ul>
                    </div>
                    <div class="col-lg-12">
                        <div class="sep"></div>
                    </div>
                </div>
            </div>
        </div>

        <div class="more-info"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="tabs-content">
                        <div class="row">
                            <div class="nav-wrapper ">
                                <ul class="nav nav-tabs" role="tablist">
                                    {{-- <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="description-tab" data-bs-toggle="tab" data-bs-target="#description" type="button" role="tab" aria-controls="description" aria-selected="true">Description</button>
                  </li> --}}
                                    <li class="nav-item" role="presentation">
                                        <button class="nav-link" id="reviews-tab" data-bs-toggle="tab"
                                            data-bs-target="#reviews" type="button" role="tab" aria-controls="reviews"
                                            aria-selected="false">{{ trans('messages.reviews') }}
                                            ({{ $reviewscount }})</button>
                                    </li>
                                </ul>
                            </div>
                            <div class="tab-content" id="myTabContent">
                                {{-- <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                  <p>You can search for more templates on Google Search using keywords such as "templatemo digital marketing", "templatemo one-page", "templatemo gallery", etc. Please tell your friends about our website. If you need a variety of HTML templates, you may visit Tooplate and Too CSS websites.</p>
                  <br>
                  <p>Coloring book air plant shabby chic, crucifix normcore raclette cred swag artisan activated charcoal. PBR&B fanny pack pok pok gentrify truffaut kitsch helvetica jean shorts edison bulb poutine next level humblebrag la croix adaptogen. Hashtag poke literally locavore, beard marfa kogi bruh artisan succulents seitan tonx waistcoat chambray taxidermy. Same cred meggings 3 wolf moon lomo irony cray hell of bitters asymmetrical gluten-free art party raw denim chillwave tousled try-hard succulents street art.</p>
                </div> --}}
                                <div class="tab-pane fade show active" id="reviews" role="tabpanel"
                                    aria-labelledby="reviews-tab">
                                    @include('user.product.reviewproduct')
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="message-form">
                        <form id="review-form" action="{{ route('reviewProduct') }}" method="post">
                            @csrf
                            <input type="hidden" name="product_id" value="{{ $product->id }}">
                            <div class="form-group">
                                <label for="message">{{ trans('messages.addyourcomment') }}</label>
                                <textarea required class="form-control" id="message" name="review" rows="4"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary">{{ trans('messages.submit') }}</button>
                        </form>
                        <div id="errorMessage">
                            @if (session('error'))
                                <div class="success-error">
                                    <span>{{ session('error') }}</span>
                                    <button class="close-button">{{ trans('messages.close') }}</button>
                                </div>
                            @endif
                        </div>
                        <div id="successMessage">
                            @if (session('success'))
                                <div class="success-message">
                                    <span>{{ session('error') }}</span>
                                    <button class="close-button">{{ trans('messages.close') }}</button>
                                </div>
                            @endif
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
        <script>
            $(document).ready(function() {
                $('#review-form').submit(function(e) {
                    e.preventDefault();

                    $.ajax({
                        type: 'POST',
                        url: '{{ route('reviewProduct') }}',
                        data: $(this).serialize(),
                        success: function(data) {
                            if (data.success === false) {
                                // Display the error message within the "successMessage" div
                                $('#errorMessage').html('<div class="success-error"><span>' + data
                                    .message +
                                    '</span></div>');
                                setTimeout(function() {
                                    $('.success-error').remove();
                                }, 3000);
                            } else {
                                $('#successMessage').html('<div class="success-message"><span>' +
                                    data
                                    .message +
                                    '</span></div>');
                                setTimeout(function() {
                                    $('.success-message').remove();
                                }, 3000);
                            }
                        },
                        error: function(xhr, status, error) {
                            $('#errorMessage').html('<div class="success-error"><span>' + error +
                                '</span></div>');
                            setTimeout(function() {
                                $('.success-error').remove();
                            }, 3000);
                        }
                    });
                });
            });
        </script>
        <div class="section categories related-games">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="section-heading">
                            <h6>
                                @if (app()->getLocale() == 'ar')
                                    {{ $product->typegame->namear }}
                                @else
                                    {{ $product->typegame->name }}
                                @endif
                            </h6>
                            <h2>{{ trans('messages.relatedgames') }}</h2>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="main-button">
                            {{-- <a href="shop.html">View All</a> --}}
                        </div>
                    </div>

                    @if ($related_products->count() > 0)
                        @foreach ($related_products as $related_product)
                            <div class="col-lg col-sm-6 col-xs-12">
                                <div class="item">
                                    <h4>
                                        @if (app()->getLocale() == 'ar')
                                            {{ $related_product->typegame->namear }}
                                        @else
                                            {{ $related_product->typegame->name }}
                                        @endif
                                    </h4>
                                    <div class="thumb">
                                        <a href="{{ route('products.id', ['id' => $related_product->id]) }}">
                                            <img style="width: 230px;  height: 250px"
                                                src="{{ asset('products/images/' . $related_product->image) }}"
                                                alt="">
                                        </a>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    @else
                        <div class="col-lg-12">
                            <p>No related games found.</p>
                        </div>
                    @endif

                </div>
            </div>
        </div>




    </body>

    </html>

@endsection
