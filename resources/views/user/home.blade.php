@extends('user.layouts.app')

@section('body')
    @if (session('success'))
        <div class="success-message" id="successMessage">
            <span>{{ session('success') }}</span>
            <button class="close-button">Close</button>
        </div>
    @endif



    <style>
        .success-message {
            position: fixed;
            bottom: 10px;
            left: 10px;
            background-color: #4CAF50;
            color: white;
            padding: 10px;
            border-radius: 5px;
            z-index: 999;
            opacity: 0;
            animation: slideIn 0.5s forwards;
        }

        .close-button {
            background: none;
            border: none;
            color: white;
            cursor: pointer;
            margin-left: 10px;
        }

        /* Define the opening animation */
        @keyframes slideIn {
            from {
                bottom: -50px;
                opacity: 0;
            }

            to {
                bottom: 10px;
                opacity: 1;
            }
        }
    </style>
    <script>
        const successMessage = document.getElementById('successMessage');
        const closeButton = successMessage.querySelector('.close-button');

        // Function to close the success message
        function closeSuccessMessage() {
            successMessage.style.animation = 'slideOut 0.5s';
            setTimeout(() => {
                successMessage.style.display = 'none';
            }, 500); // Delay hiding for the duration of the slideOut animation
        }

        closeButton.addEventListener('click', closeSuccessMessage);

        // Automatically close the message after a few seconds (optional)
        setTimeout(closeSuccessMessage, 5000); // Close after 5 seconds (adjust as needed)
    </script>


    <div class="main-banner">
        <div class="container">
            <div class="row">
                <div class="col-lg-6 align-self-center">
                    <div class="caption header-text">
                        <style>
                            .large-image {
                                width: 500px;
                            }

                            @media (max-width: 768px) {
                                .large-image {
                                    width: 330px;
                                }
                            }
                        </style>
                        <h6>
                            <img class="large-image" src="{{ asset('images/ww.gif') }}" alt="Large Image">
                        </h6>
                        <h2>{{ trans('messages.bestgaming') }}</h2>

                        <p>{{ trans('messages.welcometogamebrio') }}</p>
                        <div class="search-input">
                            <form id="search" action="{{ route('search') }}" method="GET">
                                <input type="text" placeholder="{{ trans('messages.typeofsomething') }}" id='searchText'
                                    name="search" />
                                <button role="submit">{{ trans('messages.searchnow') }}</button>
                            </form>


                        </div>
                    </div>
                </div>

                @forelse ($bestoffer as $bestoffers)
                    <div class="col-lg-4 offset-lg-2">
                        <div class="right-image">
                            <a href="products/{{ $bestoffers->id }}"><img style="height: 350px"
                                    src="{{ asset('products/images/' . $bestoffers->image) }}" alt=""></a>

                            <span
                                class="price"><del>${{ $bestoffers->price }}</del><br />${{ $bestoffers->price_after_discount }}</span>
                            <span class="offer">-50%</span>
                        </div>
                    </div>
                @empty
                @endforelse
            </div>
        </div>
    </div>

    <div class="features">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-md-6">
                    <a>
                        <div class="item">
                            <div class="image">
                                <img src="assets/images/featured-01.png" alt="" style="max-width: 44px;">
                            </div>
                            <h4>{{ trans('messages.sellgames') }}</h4>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a>
                        <div class="item">
                            <div class="image">
                                <img src="assets/images/featured-02.png" alt="" style="max-width: 44px;">
                            </div>
                            <h4>{{ trans('messages.usermore') }}</h4>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a>
                        <div class="item">
                            <div class="image">
                                <img src="assets/images/featured-03.png" alt="" style="max-width: 44px;">
                            </div>
                            <h4>{{ trans('messages.replyready') }}</h4>
                        </div>
                    </a>
                </div>
                <div class="col-lg-3 col-md-6">
                    <a>
                        <div class="item">
                            <div class="image">
                                <img src="assets/images/featured-04.png" alt="" style="max-width: 44px;">
                            </div>
                            <h4>{{ trans('messages.easybuy') }}</h4>
                        </div>
                    </a>
                </div>
            </div>
        </div>
    </div>

    <div class="section trending">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h6>{{ trans('messages.games') }}</h6>
                        <h2>{{ trans('messages.randomgames') }}</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-button">
                        <a href="{{ route('product') }}">{{ trans('messages.viewall') }}</a>
                    </div>
                </div>


                @forelse ($product as $products)
                    <div class="col-lg-2 col-md-6">
                        <div class="item">
                            <div class="thumb">
                                <a href="products/{{ $products->id }}"><img style=" height: 180px;"
                                        src="{{ asset('products/images/' . $products->image) }}" alt=""></a>
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
                                <h4>
                                    @if (app()->getLocale() == 'ar')
                                        {{ $products->typegame->namear }}
                                    @else
                                        {{ $products->typegame->name }}
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

    <div class="section most-played">
        <div class="container">
            <div class="row">
                <div class="col-lg-6">
                    <div class="section-heading">
                        <h6>{{ trans('messages.topgames') }}</h6>
                        <h2>{{ trans('messages.mostplayed') }}</h2>
                    </div>
                </div>
                <div class="col-lg-6">
                    <div class="main-button">
                        <a href="product">{{ trans('messages.viewall') }}</a>
                    </div>
                </div>
                @forelse ($product2 as $products)
                    <div class="col-lg-2 col-md-6 col-sm-6">
                        <div class="item">
                            <div class="thumb">
                                <a href="products/{{ $products->id }}"><img style="width: 250px; height: 200px"
                                        src="{{ asset('products/images/' . $products->image) }}" alt=""></a>
                            </div>
                            <div class="down-content">
                                <span class="category">
                                    @if (app()->getLocale() == 'ar')
                                        {{ $products->typegame->namear }}
                                    @else
                                        {{ $products->typegame->name }}
                                    @endif
                                </span>
                                <h4 style="white-space: nowrap; overflow: hidden;">
                                    @if (app()->getLocale() == 'ar')
                                        {{ $products->namear }}
                                    @else
                                        {{ $products->name }}
                                    @endif
                                </h4>
                                <a href="products/{{ $products->id }}">{{ trans('messages.explore') }}</a>
                            </div>
                        </div>
                    </div>

                @empty
                @endforelse
            </div>
        </div>
    </div>

    <div class="section categories">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <div class="section-heading">
                        <h6>{{ trans('messages.categories') }}</h6>
                        <h2>{{ trans('messages.topcategories') }}</h2>
                    </div>
                </div>
                <div class="col-lg col-sm-6 col-xs-12">
                    <div class="item">
                        <h4>{{ trans('messages.action') }}</h4>
                        <div class="thumb">
                            <a><img src="assets/images/categories-01.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-sm-6 col-xs-12">
                    <div class="item">
                        <h4>{{ trans('messages.story') }}</h4>
                        <div class="thumb">
                            <a><img src="assets/images/categories-05.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-sm-6 col-xs-12">
                    <div class="item">
                        <h4>{{ trans('messages.horror') }}</h4>
                        <div class="thumb">
                            <a><img src="assets/images/categories-03.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-sm-6 col-xs-12">
                    <div class="item">
                        <h4>{{ trans('messages.fighting') }}</h4>
                        <div class="thumb">
                            <a><img src="assets/images/categories-04.jpg" alt=""></a>
                        </div>
                    </div>
                </div>
                <div class="col-lg col-sm-6 col-xs-12">
                    <div class="item">
                        <h4>{{ trans('messages.adventure') }}</h4>
                        <div class="thumb">
                            <a><img height="227px" src="{{ asset('assets/images/top-game-06.jpg') }}"
                                    alt=""></a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="section cta">
        <div class="container">
            <div class="row">
                <div class="col-lg-5">
                    <div class="shop">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-heading">
                                    <h6>{{ trans('messages.ourshop') }}</h6>
                                    <h2>{{ trans('messages.getbestprice') }}</h2>

                                </div>
                                <p>{{ trans('messages.bestgamescard') }}</p>
                                <div class="main-button">
                                    <a href="{{ route('product') }}">{{ trans('messages.shopnow') }}</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 offset-lg-2 align-self-end">
                    <div class="subscribe">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="section-heading">
                                    <h6>{{ trans('messages.newsletter') }}</h6>
                                    <h2>{{ trans('messages.getupsubscribe') }}</h2>
                                </div>
                                <div class="search-input">
                                    <form id="subscribe" action="#">
                                        <input disabled type="email" class="form-control" id="exampleInputEmail1"
                                            aria-describedby="emailHelp" placeholder="Your email...">
                                        <button disabled> {{ trans('messages.subscribenow') }}</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <style>
        .testimonials {
            padding: 40px 0;
            color: #434343;
            text-align: center;
        }

        .inner {
            max-width: 1200px;
            margin: auto;
            overflow: hidden;
            padding: 0 20px;
        }

        .border {
            width: 160px;
            height: 5px;
            background: #6ab04c;
            margin: 26px auto;
        }

        .row {
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
        }

        .col {
            flex: 33.33%;
            max-width: 33.33%;
            box-sizing: border-box;
            padding: 15px;
        }

        .testimonial {
            background: #fff;
            padding: 30px;
        }

        .testimonial img {
            width: 100px;
            height: 100px;
            border-radius: 50%;
        }

        .name {
            font-size: 20px;
            text-transform: uppercase;
            margin: 20px 0;
        }

        .stars {
            color: #6ab04c;
            margin-bottom: 20px;
        }


        @media screen and (max-width:960px) {
            .col {
                flex: 100%;
                max-width: 80%;
            }
        }

        @media screen and (max-width:600px) {
            .col {
                flex: 100%;
                max-width: 100%;
            }
        }
    </style>
    <!DOCTYPE html>
    <html lang="en" dir="ltr">


    <head>
        <meta charset="utf-8">
        <title></title>
        <link rel="stylesheet" href="style.css">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

    <body>

        <div class="testimonials">
            <div class="inner">
                <h1>{{ trans('messages.testimonials') }}</h1>
                <div class="border"></div>

                <div class="row">


                    @forelse ($ordersratings as $ordersrating)
                        <div class="col">
                            <div class="testimonial">
                                <img src="{{ asset('http://bootdey.com/img/Content/avatar/avatar1.png') }}"
                                    alt="">
                                <div class="name">{{ $ordersrating->Users->name }}</div>
                                <div class="stars">
                                    @for ($i = 1; $i <= 5; $i++)
                                        @if ($i <= $ordersrating->rating)
                                            <i class="fas fa-star"></i>
                                        @else
                                            <i class="far fa-star"></i>
                                        @endif
                                    @endfor
                                </div>

                                <h6>
                                    {{ $ordersrating->opinion }}
                                </h6>

                                <p class="date" style="color: #888;">

                                    @if (app()->getLocale() == 'ar')
                                        {{ $ordersrating->created_at->format('M d, Y') }}
                                        :{{ trans('messages.createdat') }}
                                    @else
                                        {{ trans('messages.createdat') }}:
                                        {{ $ordersrating->created_at->format('M d, Y') }}
                                    @endif
                                    {{-- Format the date as needed --}}
                                </p>



                            </div>

                        </div>

                    @empty
                        <p>No testimonials available.</p>
                    @endforelse


                </div>
            </div>
        </div>
    </body>

    </html>



    </body>

    </html>
@endsection
