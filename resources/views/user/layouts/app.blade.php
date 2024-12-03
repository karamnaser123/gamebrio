<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/headlogo.png') }}">
    <title>GameBrio to sell Games</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;200;300;400;500;600;700;800;900&display=swap"
        rel="stylesheet">


    <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('assets/css/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/templatemo-lugx-gaming.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/owl.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/animate.css') }}">
    <link rel="stylesheet"href="https://unpkg.com/swiper@7/swiper-bundle.min.css" />
    
    <script async src="https://pagead2.googlesyndication.com/pagead/js/adsbygoogle.js?client=ca-pub-8635091955853882"
     crossorigin="anonymous"></script>
     <meta name="google-site-verification" content="stGI6wCF8NdBS9BMDkFdHVYzBsF3KwbjEqsz3rOjt5U" />
</head>

<body>
    <div>

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


        @if (Auth::check())
            <!--Start of Tawk.to Script-->
            <script type="text/javascript">
                var Tawk_API = Tawk_API || {};
                var Tawk_LoadStart = new Date();

                // Provide the user's name
                var userName = "<?php echo auth()->user()->username; ?>";

                (function() {
                    var s1 = document.createElement("script"),
                        s0 = document.getElementsByTagName("script")[0];
                    s1.async = true;
                    s1.src = 'https://embed.tawk.to/639b26d9daff0e1306dccfd6/1gkb0vh4o';
                    s1.charset = 'UTF-8';
                    s0.parentNode.insertBefore(s1, s0);

                    // Set the user's name in Tawk.to
                    Tawk_API.onLoad = function() {
                        Tawk_API.setAttributes({
                            'name': userName
                        });
                    };
                })();
            </script>
            <!--End of Tawk.to Script-->
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
        @include('user.layouts.nav')

        @yield('body')
        @include('user.layouts.bottom')
    </div>

</body>

</html>

<script src="{{ asset('vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('vendor/bootstrap/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/js/isotope.min.js') }}"></script>
<script src="{{ asset('assets/js/owl-carousel.js') }}"></script>
<script src="{{ asset('assets/js/counter.js') }}"></script>
<script src="{{ asset('assets/js/custom.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    // Function to update the cart count element
    function updateCartCount() {
        $.ajax({
            type: 'GET',
            url: "{{ route('cart.count') }}",
            success: function(response) {
                var cartCount = response.count;
                $('#cart-count').text(cartCount);
            },
            error: function(xhr, textStatus, errorThrown) {
                console.error(xhr.responseJSON.error);
            }
        });
    }

    $(document).ready(function() {
        $('.addToCartForm').on('submit', function(e) {
            e.preventDefault();
            var form = $(this);
            var productId = form.data('product-id');
            var quantity = form.find('input[name="quantity"]').val();

            var addToCartUrl = "{{ route('addToCart', ['product' => ':product']) }}";
            addToCartUrl = addToCartUrl.replace(':product', productId);


            $.ajax({
                type: 'POST',
                url: addToCartUrl,
                data: {
                    _token: "{{ csrf_token() }}",
                    product_id: productId,
                    quantity: quantity
                },
                success: function(response) {
                    var successMessage = '<div class="success-message">' + response
                        .success + '</div>';
                    form.after(successMessage);

                    setTimeout(function() {
                        $('.success-message').remove();
                    }, 3000);

                    // Update the cart count
                    updateCartCount();
                },
                error: function(xhr, textStatus, errorThrown) {
                    if (xhr.status === 404) {
                        var errorMessage = xhr.responseJSON.error;
                        var successerror = '<div class="success-error">' + errorMessage +
                            '</div>';
                        form.after(successerror);

                        setTimeout(function() {
                            $('.success-error').remove();
                        }, 3000);
                    } else {
                        console.error(xhr.responseJSON.error);
                    }
                }
            });
        });

        // Initialize the cart count when the page loads
        updateCartCount();
    });
</script>
