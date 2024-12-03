<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
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
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <x-auth-session-status class="mb-4" style="background-color: green;color:white;" :status="session('status')" />

                <form class="login100-form validate-form" method="post" action="{{ route('login') }}">
                    @csrf
                    <span class="login100-form-title p-b-49">
                        {{ trans('messages.login') }}
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Email is reauired">
                        <span class="label-input100">{{ trans('messages.emailorusername') }}</span>
                        <input class="input100" type="text" name="login"
                            placeholder="{{ trans('messages.emailorusername') }}" value="{{ old('login') }}">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                        <x-input-error style="background-color: red;color:white" :messages="$errors->get('login')" class="mt-2" />
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Password is required">
                        <span class="label-input100">{{ trans('messages.password') }}</span>
                        <input class="input100" type="password" name="password"
                            placeholder="{{ trans('messages.password') }}">
                        <span class="focus-input100" data-symbol="&#xf190;"></span>
                        <x-input-error :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="wrap-input100">
                        <input class="input-checkbox" type="checkbox" id="remember" name="remember">
                        <label class="label-checkbox" for="remember">{{ trans('messages.rememberme') }}</label>
                    </div>


                    <div class="wrap-input100">
                        <style>
                            /* Add this to your existing CSS or create a new CSS file */

                            .input-checkbox {
                                position: absolute;
                                opacity: 0;
                            }

                            .label-checkbox {
                                position: relative;
                                padding-left: 35px;
                                /* Adjust as needed for spacing */
                                cursor: pointer;
                                font-size: 16px;
                                color: #333;
                                /* Change the color to match your design */
                            }

                            .label-checkbox:before {
                                content: '';
                                position: absolute;
                                left: 0;
                                top: 0;
                                width: 25px;
                                height: 25px;
                                border: 2px solid #333;
                                /* Change the color to match your design */
                                background-color: transparent;
                                border-radius: 5px;
                                box-sizing: border-box;
                                transition: background-color 0.3s ease;
                            }

                            .input-checkbox:checked+.label-checkbox:before {
                                background-color: #4CAF50;
                                /* Change the background color when checked */
                                border-color: #4CAF50;
                                /* Change the border color when checked */
                            }

                            .label-checkbox:after {
                                content: '\2713';
                                /* Unicode checkmark character */
                                position: absolute;
                                left: 8px;
                                top: 2px;
                                color: #fff;
                                /* Change the color to match your design */
                                font-size: 18px;
                                opacity: 0;
                                transform: scale(0);
                                transition: opacity 0.3s ease, transform 0.3s ease;
                            }

                            .input-checkbox:checked+.label-checkbox:after {
                                opacity: 1;
                                transform: scale(1);
                            }
                        </style>

                    </div>

                    <div class="text-right p-t-8 p-b-31">
                        <a href="{{ route('forget.password') }}">
                            {{ trans('messages.forgotpassword') }}
                        </a>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn">
                                {{ trans('messages.login') }}
                            </button>
                        </div>
                    </div>

                    <div class="txt1 text-center p-t-54 p-b-20">
                        <span>
                            {{ trans('messages.orloginusing') }}
                        </span>
                    </div>

                    <div class="flex-c-m">
                        {{-- <a href="{{ route('facebook.login') }}" class="login100-social-item bg1">
                            <i class="fa fa-facebook"></i>
                        </a> --}}
                        {{-- 
                        <a href="#" class="login100-social-item bg2">
                            <i class="fa fa-twitter"></i>
                        </a> --}}

                        <a href="{{ route('google.login') }}" class="login100-social-item bg3">
                            <i class="fa fa-google"></i>
                        </a>
                    </div>

                    <div class="flex-col-c p-t-155">
                        <span class="txt1 p-b-17">
                            {{ trans('messages.orcreateacoountusing') }}
                        </span>

                        <a href="register" class="txt2">
                            {{ trans('messages.createacoount') }}
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
