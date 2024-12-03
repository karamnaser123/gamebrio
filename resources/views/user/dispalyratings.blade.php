@extends('user.layouts.app')

@section('body')

    <div class="page-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h3>{{ trans('messages.testimonials') }}</h3>
                    <span class="breadcrumb"><a href="{{ route('home') }}">{{ trans('messages.home') }}</a> >
                        {{ trans('messages.testimonials') }}</span>
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
                                <img src="{{ asset('http://bootdey.com/img/Content/avatar/avatar1.png') }}" alt="">
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

@endsection
