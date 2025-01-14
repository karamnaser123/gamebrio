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
            <div class="col-xl-4">
                <!-- Profile picture card-->
                <div class="card mb-4 mb-xl-0">
                    <div class="card-header">{{ trans('messages.profileimage') }}</div>
                    <div class="card-body text-center">
                        <!-- Profile picture image-->
                        <img class="img-account-profile rounded-circle mb-2"
                            src="http://bootdey.com/img/Content/avatar/avatar1.png" alt="">
                        <!-- Profile picture help block-->
                        {{-- <div class="small font-italic text-muted mb-4">JPG or PNG no larger than 5 MB</div> --}}
                        <!-- Profile picture upload button-->
                        {{-- <button class="btn btn-primary" type="button">Upload new image</button> --}}
                    </div>
                </div>
            </div>
            <div class="col-xl-8">
                <!-- Account details card-->
                <div class="card mb-4">
                    <div class="card-header">{{ trans('messages.accountdetails') }}</div>
                    <div class="card-body">
                        @if ($errors->any())
                            <div class="mt-2 text-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif



                        <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
                            @csrf
                            @method('patch')
                            <!-- Form Group (username)-->
                            {{-- <div class="mb-3">
                                <label class="small mb-1" for="inputUsername">Username (how your name will appear to
                                    other users on the site)</label>
                                <input class="form-control" id="inputUsername" type="text"
                                    placeholder="Enter your username" value="{{ $user->name }}">
                            </div> --}}
                            <!-- Form Row-->
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1"
                                        for="inputFirstName">{{ trans('messages.email') }}</label>
                                    <input class="form-control" id="inputFirstName" type="text" disabled
                                        placeholder="Enter your first name" value="{{ $user->email }}">
                                </div>

                                <!-- Form Group (last name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1"
                                        for="inputLastName">{{ trans('messages.username') }}</label>
                                    <input class="form-control" id="inputLastName" type="text" disabled
                                        placeholder="Enter your last name" value="{{ $user->username }}">
                                </div>
                            </div>
                            <div class="row gx-3 mb-3">
                                <!-- Form Group (first name)-->
                                <div class="col-md-6">
                                    <label class="small mb-1" for="inputFirstName">{{ trans('messages.name') }}</label>
                                    <input class="form-control" id="inputFirstName" type="text" name="name"
                                        placeholder="Enter your first name" value="{{ $user->name }}">
                                </div>

                            </div>



                    </div>
                    <button class="btn btn-primary" type="submit">{{ trans('messages.save') }}</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
