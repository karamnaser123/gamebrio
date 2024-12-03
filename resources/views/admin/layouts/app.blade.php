<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/headlogo.png') }}">
    <title>GameBrio to sell Games</title>

    <link href="{{ asset('admin/libs/chartist/dist/chartist.min.css') }}" rel="stylesheet">


    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- Include Bootstrap JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <link href="{{ asset('admin/css/style.min.css') }}" rel="stylesheet">
</head>

<body>
    @if (session('success'))
        <div class="success-message" id="successMessage">
            <span>{{ session('success') }}</span>
            <button class="close-button">Close</button>
        </div>
    @endif
    @if (session('error'))
        <div class="success-error" id="successMessage">
            <span>{{ session('error') }}</span>
            <button class="close-button">Close</button>
        </div>
    @endif

    @if ($errors->any())
        <div class="success-error" id="successMessage">
            <span>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </span>
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

        .success-error {
            position: fixed;
            bottom: 10px;
            left: 10px;
            background-color: red;
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
    @include('admin.layouts.nav')

    @yield('body')

</body>

</html>
<script src="{{ asset('admin/libs/jquery/dist/jquery.min.js') }}"></script>
<!-- Bootstrap tether Core JavaScript -->
<script src="{{ asset('admin/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admin/js/app-style-switcher.js') }}"></script>
<!--Wave Effects -->
<script src="{{ asset('admin/js/waves.js') }}"></script>
<!--Menu sidebar -->
<script src="{{ asset('admin/js/sidebarmenu.j') }}s"></script>
<!--Custom JavaScript -->
<script src="../../dist/js/custom.js"></script>
<!--This page JavaScript -->
<!--chartis chart-->
<script src="{{ asset('admin/libs/chartist/dist/chartist.min.js') }}"></script>
<script src="{{ asset('admin/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js') }}"></script>
<script src="{{ asset('admin/js/pages/dashboards/dashboard1.js') }}"></script>
