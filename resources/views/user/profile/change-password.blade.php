<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/headlogo.png') }}">
    <title>GameBrio to sell Games</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous">
    </script>
    <style>
        body {
            margin-top: 20px;
            background-color: #f2f6fc;
            color: #69707a;
        }

        .img-account-profile {
            height: 10rem;
        }

        .rounded-circle {
            border-radius: 50% !important;
        }

        .card {
            box-shadow: 0 0.15rem 1.75rem 0 rgb(33 40 50 / 15%);
        }

        .card .card-header {
            font-weight: 500;
        }

        .card-header:first-child {
            border-radius: 0.35rem 0.35rem 0 0;
        }

        .card-header {
            padding: 1rem 1.35rem;
            margin-bottom: 0;
            background-color: rgba(33, 40, 50, 0.03);
            border-bottom: 1px solid rgba(33, 40, 50, 0.125);
        }

        .form-control,
        .dataTable-input {
            display: block;
            width: 100%;
            padding: 0.875rem 1.125rem;
            font-size: 0.875rem;
            font-weight: 400;
            line-height: 1;
            color: #69707a;
            background-color: #fff;
            background-clip: padding-box;
            border: 1px solid #c5ccd6;
            -webkit-appearance: none;
            -moz-appearance: none;
            appearance: none;
            border-radius: 0.35rem;
            transition: border-color 0.15s ease-in-out, box-shadow 0.15s ease-in-out;
        }

        .nav-borders .nav-link.active {
            color: #0061f2;
            border-bottom-color: #0061f2;
        }

        .nav-borders .nav-link {
            color: #69707a;
            border-bottom-width: 0.125rem;
            border-bottom-style: solid;
            border-bottom-color: transparent;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            padding-left: 0;
            padding-right: 0;
            margin-left: 1rem;
            margin-right: 1rem;
        }

        .btn-danger-soft {
            color: #000;
            background-color: #f1e0e3;
            border-color: #f1e0e3;
        }

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
    </style>
</head>
@if (session('success'))
    <div class="success-message" id="successMessage">
        <span>{{ session('success') }}</span>
        <button class="close-button">Close</button>
    </div>
@endif
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

<body>
    <div class="container-xl px-4 mt-4">
        <!-- Account page navigation-->
        <nav class="nav nav-borders">
            <a class="nav-link  ms-0" href="{{ route('profile.edit') }}">{{ trans('messages.profile') }}</a>
            <a class="nav-link" href="{{ route('change.index') }}">{{ trans('messages.security') }}</a>
            <a class="nav-link" href="{{ route('home') }}">{{ trans('messages.home') }}</a>

        </nav>
        <hr class="mt-0 mb-4">
        <div class="row">
            <div class="col-lg-8">
                <!-- Change password card-->
                <div class="card mb-4">
                    <div class="card-header">{{ trans('messages.changepassword') }}</div>
                    <div class="card-body">
                        @if ($errors->updatePassword->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->updatePassword->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif

                        @if (session('success'))
                            <div class="alert alert-success">
                                {{ session('success') }}
                            </div>
                        @endif


                        <form method="post" action="{{ route('change.password') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('put')
                            <!-- Form Group (current password)-->
                            <div class="mb-3">
                                <label class="small mb-1"
                                    for="currentPassword">{{ trans('messages.currentpassword') }}</label>
                                <input class="form-control" id="currentPassword" type="password" name="current_password"
                                    placeholder="{{ trans('messages.currentpassword') }}">
                            </div>
                            <!-- Form Group (new password)-->
                            <div class="mb-3">
                                <label class="small mb-1" for="newPassword">{{ trans('messages.newpassword') }}</label>
                                <input class="form-control" id="newPassword" type="password" name="password"
                                    placeholder="{{ trans('messages.newpassword') }}">
                            </div>
                            <!-- Form Group (confirm password)-->
                            <div class="mb-3">
                                <label class="small mb-1"
                                    for="confirmPassword">{{ trans('messages.passwordconfirm') }}</label>
                                <input class="form-control" id="confirmPassword" type="password"
                                    name="password_confirmation" placeholder="{{ trans('messages.passwordconfirm') }}">
                            </div>
                            <button class="btn btn-primary" type="submit">{{ trans('messages.save') }}</button>
                        </form>
                    </div>
                </div>
                <!-- Security preferences card-->
                {{-- <div class="card mb-4">
                    <div class="card-header">Security Preferences</div>
                    <div class="card-body">
                        <!-- Account privacy optinos-->
                        <h5 class="mb-1">Account Privacy</h5>
                        <p class="small text-muted">By setting your account to private, your profile information and
                            posts will not be visible to users outside of your user groups.</p>
                        <form>
                            <div class="form-check">
                                <input class="form-check-input" id="radioPrivacy1" type="radio" name="radioPrivacy"
                                    checked="">
                                <label class="form-check-label" for="radioPrivacy1">Public (posts are available to all
                                    users)</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="radioPrivacy2" type="radio" name="radioPrivacy">
                                <label class="form-check-label" for="radioPrivacy2">Private (posts are available to only
                                    users in your groups)</label>
                            </div>
                        </form>
                        <hr class="my-4">
                        <!-- Data sharing options-->
                        <h5 class="mb-1">Data Sharing</h5>
                        <p class="small text-muted">Sharing usage data can help us to improve our products and better
                            serve our users as they navigation through our application. When you agree to share usage
                            data with us, crash reports and usage analytics will be automatically sent to our
                            development team for investigation.</p>
                        <form>
                            <div class="form-check">
                                <input class="form-check-input" id="radioUsage1" type="radio" name="radioUsage"
                                    checked="">
                                <label class="form-check-label" for="radioUsage1">Yes, share data and crash reports with
                                    app developers</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="radioUsage2" type="radio" name="radioUsage">
                                <label class="form-check-label" for="radioUsage2">No, limit my data sharing with app
                                    developers</label>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <!-- Two factor authentication card-->
                <div class="card mb-4">
                    <div class="card-header">Two-Factor Authentication</div>
                    <div class="card-body">
                        <p>Add another level of security to your account by enabling two-factor authentication. We will
                            send you a text message to verify your login attempts on unrecognized devices and browsers.
                        </p>
                        <form>
                            <div class="form-check">
                                <input class="form-check-input" id="twoFactorOn" type="radio" name="twoFactor"
                                    checked="">
                                <label class="form-check-label" for="twoFactorOn">On</label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" id="twoFactorOff" type="radio" name="twoFactor">
                                <label class="form-check-label" for="twoFactorOff">Off</label>
                            </div>
                            <div class="mt-3">
                                <label class="small mb-1" for="twoFactorSMS">SMS Number</label>
                                <input class="form-control" id="twoFactorSMS" type="tel"
                                    placeholder="Enter a phone number" value="555-123-4567">
                            </div>
                        </form>
                    </div>
                </div>
                <!-- Delete account card-->
                <div class="card mb-4">
                    <div class="card-header">Delete Account</div>
                    <div class="card-body">
                        <p>Deleting your account is a permanent action and cannot be undone. If you are sure you want to
                            delete your account, select the button below.</p>
                        <button class="btn btn-danger-soft text-danger" type="button">I understand, delete my
                            account</button>
                    </div>
                </div> --}}
            </div>
        </div>
    </div>
</body>

</html>
