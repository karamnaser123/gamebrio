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
</head>

<body>

    <div class="limiter">
        <div class="container-login100" style="background-image: url('images/bg-01.jpg');">
            <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-54">
                <x-auth-session-status class="mb-4" style="background-color: green;color:white;" :status="session('status')" />

                <form method="POST" action="{{ route('password.store') }}">
                    @csrf

                    <!-- Password Reset Token -->
                    <input type="hidden" name="token" value="{{ $request->route('token') }}">
                    <span class="login100-form-title p-b-49">
                        Reset Password
                    </span>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Email is required">
                        <span class="label-input100">Email</span>
                        <input class="input100" type="text" name="email" placeholder="Type your Email" readonly
                            value="{{ old('email', $request->email) }}">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                        <x-input-error style="background-color: red;color:white" :messages="$errors->get('email')" class="mt-2" />
                    </div>

                    <div class="wrap-input100 validate-input m-b-23" data-validate = "Password is required">
                        <span class="label-input100">Password</span>
                        <input class="input100" type="password" name="password" placeholder="Type your Password">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                        <x-input-error style="background-color: red;color:white" :messages="$errors->get('password')" class="mt-2" />
                    </div>

                    <div class="wrap-input100 validate-input m-b-23"
                        data-validate = "password_confirmation is required">
                        <span class="label-input100">Password Confirmation</span>
                        <input class="input100" type="password" name="password_confirmation"
                            placeholder="Type your password_confirmation">
                        <span class="focus-input100" data-symbol="&#xf206;"></span>
                        <x-input-error style="background-color: red;color:white" :messages="$errors->get('password_confirmation')" class="mt-2" />
                    </div>



                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button type="submit" class="login100-form-btn">
                                Send
                            </button>
                        </div>
                    </div>

                    <div class="flex-col-c p-t-155">
                        <span class="txt1 p-b-17">
                            Or Login Using
                        </span>

                        <a href="{{ route('login') }}" class="txt2">
                            Login
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
