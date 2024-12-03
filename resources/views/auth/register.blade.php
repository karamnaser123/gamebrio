<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/x-icon" href="{{ asset('images/headlogo.png') }}">
    <title>GameBrio to sell Games</title>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/bootstrap/css/bootstrap.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('log/fonts/font-awesome-4.7.0/css/font-awesome.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css"
        href="{{ asset('log/fonts/iconic/css/material-design-iconic-font.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/animate/animate.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/css-hamburgers/hamburgers.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/animsition/css/animsition.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/select2/select2.min.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('log/vendor/daterangepicker/daterangepicker.css') }}">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="{{ asset('log/css/util.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('log/css/main.css') }}">
    <!--===============================================================================================-->
    <style>
        .mt-2 {
            background-color: red;
            color: white;
        }
    </style>
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <form class="login100-form validate-form" method="post" action="{{ route('register') }}">
                    @csrf
                    <span class="login100-form-title p-b-49">
                        {{ trans('messages.register') }}
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Name is reauired">
                        <span class="label-input100">{{ trans('messages.name') }}</span>
                        <input class="input100" type="text" name="name"
                            placeholder="{{ trans('messages.name') }}"value="{{ old('name') }}">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                        <x-input-error :messages="$errors->get('name')" class="mt-2" />
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
                        <span class="label-input100">{{ trans('messages.email') }}</span>
                        <input class="input100" type="email" name="email"
                            placeholder="{{ trans('messages.email') }}" value="{{ old('email') }}">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                        <x-input-error :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Username is reauired">
                        <span class="label-input100">{{ trans('messages.username') }}</span>
                        <input class="input100" type="text" name="username"
                            placeholder="{{ trans('messages.username') }}" value="{{ old('username') }}">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                        <x-input-error :messages="$errors->get('username')" class="mt-2" />
                    </div>
                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Phone is reauired">
                        <span class="label-input100">{{ trans('messages.phone') }}</span>
                        <input class="input100" type="number" name="phone"
                            placeholder="{{ trans('messages.phone') }}" value="{{ old('phone') }}">
                        <span class="focus-input100" data-symbol="&#x260E;"></span>
                        <x-input-error :messages="$errors->get('phone')" class="mt-2" />
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Password is reauired">
                        <span class="label-input100">{{ trans('messages.password') }}</span>
                        <input class="input100" type="password" name="password"
                            placeholder="{{ trans('messages.password') }}">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Password Confirm is reauired">
                        <span class="label-input100">{{ trans('messages.passwordconfirm') }}</span>
                        <input class="input100" type="password" name="password_confirmation"
                            placeholder="{{ trans('messages.passwordconfirm') }}">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                        <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>




                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                {{ trans('messages.createacoount') }}
                            </button>
                        </div>
                    </div>

                    <div class="txt1 text-center p-t-54 p-b-20">
                        <span>
                            {{ trans('messages.orcreateacoountusing') }}
                        </span>
                    </div>

                    <div class="flex-c-m">
                        <a href="{{ route('google.login') }}" class="login100-social-item bg3">
                            <i class="fa fa-google"></i>
                        </a>
                    </div>

                    <div class="flex-col-c p-t-155">
                        <span class="txt1 p-b-17">
                            {{ trans('messages.orloginusing') }}
                        </span>

                        <a href="{{ route('login') }}" class="txt2">
                            {{ trans('messages.login') }}
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>


    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="{{ asset('log/vendor/jquery/jquery-3.2.1.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('log/vendor/animsition/js/animsition.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('log/vendor/bootstrap/js/popper.js') }}"></script>
    <script src="{{ asset('log/vendor/bootstrap/js/bootstrap.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('log/vendor/select2/select2.min.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('log/vendor/daterangepicker/moment.min.js') }}"></script>
    <script src="{{ asset('log/vendor/daterangepicker/daterangepicker.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('log/vendor/countdowntime/countdowntime.js') }}"></script>
    <!--===============================================================================================-->
    <script src="{{ asset('log/js/main.js') }}"></script>

</body>

</html>
