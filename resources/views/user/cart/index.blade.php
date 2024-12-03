<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="icon" type="image/x-icon" href="{{ asset('images/headlogo.png') }}">
    <title>GameBrio to sell Games</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <style>
        body {
            background: #ddd;
            min-height: 100vh;
            vertical-align: middle;
            display: flex;
            font-family: sans-serif;
            font-size: 0.8rem;
            font-weight: bold;
        }

        .title {
            margin-bottom: 5vh;
        }

        .card {
            margin: auto;
            max-width: 950px;
            width: 90%;
            box-shadow: 0 6px 20px 0 rgba(0, 0, 0, 0.19);
            border-radius: 1rem;
            border: transparent;
        }

        @media(max-width:767px) {
            .card {
                margin: 3vh auto;
            }
        }

        .cart {
            background-color: #fff;
            padding: 4vh 5vh;
            border-bottom-left-radius: 1rem;
            border-top-left-radius: 1rem;
        }

        @media(max-width:767px) {
            .cart {
                padding: 4vh;
                border-bottom-left-radius: unset;
                border-top-right-radius: 1rem;
            }
        }

        .summary {
            background-color: #ddd;
            border-top-right-radius: 1rem;
            border-bottom-right-radius: 1rem;
            padding: 4vh;
            color: rgb(65, 65, 65);
        }

        @media(max-width:767px) {
            .summary {
                border-top-right-radius: unset;
                border-bottom-left-radius: 1rem;
            }
        }

        .summary .col-2 {
            padding: 0;
        }

        .summary .col-10 {
            padding: 0;
        }

        .row {
            margin: 0;
        }

        .title b {
            font-size: 1.5rem;
        }

        .main {
            margin: 0;
            padding: 2vh 0;
            width: 100%;
        }

        .col-2,
        .col {
            padding: 0 1vh;
        }

        a {
            padding: 0 1vh;
        }

        .close {
            margin-left: auto;
            font-size: 0.7rem;
        }

        img {
            width: 3.5rem;
        }

        .back-to-shop {
            margin-top: 4.5rem;
        }

        h5 {
            margin-top: 4vh;
        }

        hr {
            margin-top: 1.25rem;
        }

        form {
            padding: 2vh 0;
        }

        select {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1.5vh 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input {
            border: 1px solid rgba(0, 0, 0, 0.137);
            padding: 1vh;
            margin-bottom: 4vh;
            outline: none;
            width: 100%;
            background-color: rgb(247, 247, 247);
        }

        input:focus::-webkit-input-placeholder {
            color: transparent;
        }

        .btn {
            background-color: #000;
            border-color: #000;
            color: white;
            width: 100%;
            font-size: 0.7rem;
            margin-top: 4vh;
            padding: 1vh;
            border-radius: 0;
        }

        .btn:focus {
            box-shadow: none;
            outline: none;
            box-shadow: none;
            color: white;
            -webkit-box-shadow: none;
            -webkit-user-select: none;
            transition: none;
        }

        .btn:hover {
            color: white;
        }

        a {
            color: black;
        }

        a:hover {
            color: black;
            text-decoration: none;
        }

        #code {
            background-image: linear-gradient(to left, rgba(255, 255, 255, 0.253), rgba(255, 255, 255, 0.185)), url("https://img.icons8.com/small/16/000000/long-arrow-right.png");
            background-repeat: no-repeat;
            background-position-x: 95%;
            background-position-y: center;
        }
    </style>

</head>
@if (session('error'))
    <div class="error-message" id="successMessage">
        <span>{{ session('error') }}</span>
        <button class="close-button">Close</button>
    </div>
@endif
@if (session('success'))
    <div class="success-message" id="successMessage">
        <span>{{ session('success') }}</span>
        <button class="close-button">Close</button>
    </div>
@endif
@if ($errors->any())
    <div class="error-message" id="successMessage">
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
        background-color: green;
        color: white;
        padding: 10px;
        border-radius: 5px;
        z-index: 999;
        opacity: 0;
        animation: slideIn 0.5s forwards;
    }

    .error-message {
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

<body>
    <div class="card">
        <div class="row">
            <div class="col-md-8 cart">
                <div class="title">
                    <div class="row">
                        <div class="col">
                            <h4><b>{{ trans('messages.shoppingcart') }}</b></h4>
                        </div>
                        <div class="col align-self-center text-right text-muted">{{ $cartcount }}
                            {{ trans('messages.items') }}</div>
                    </div>
                </div>
                @forelse ($cartItems as $item)
                    <div class="row">
                        <div class="row main align-items-center">
                            <div class="col-2">
                                <img class="img-fluid" style="width: 200px; height: 50px"
                                    src="{{ asset('products/images/' . $item->product->image) }}">
                            </div>
                            <div class="col">
                                {{-- <div class="row text-muted">{{ $item->product->description }}</div> --}}
                                @if (app()->getLocale() == 'ar')
                                    {{ $item->product->namear }}
                                @else
                                    {{ $item->product->name }}
                                @endif
                            </div>
                            <div class="col">
                                <a href="{{ route('cart.decrement', ['cartItem' => $item->id]) }}">-</a>
                                <a href="#" class="border">{{ $item->quantity }}</a>
                                <a href="{{ route('cart.increment', ['cartItem' => $item->id]) }}">+</a>

                            </div>
                            <div class="col">$ {{ $item->product->price_after_discount }} <a
                                    href="{{ route('deleteProductFromCart', ['productId' => $item->products_id]) }}">
                                    <span class="close">&#10005;</span></a>
                            </div>
                        </div>
                    </div>
                @empty
                    <p>{{ trans('messages.noitemsincart') }}</p>
                @endforelse
                @if (!$cartItems->isEmpty())
                    <div class="text-center mt-4">
                        <form id="clear-cart-form" action="{{ route('cart.clear') }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="button" style="width: 100px" class="btn btn-danger"
                                onclick="confirmClearCart()">{{ trans('messages.clearcart') }}</button>
                        </form>
                    </div>
                @endif
                <script>
                    function confirmClearCart() {
                        if (confirm('Are you sure you want to clear your cart?')) {
                            document.getElementById('clear-cart-form').submit();
                        }
                    }
                </script>
                <div class="back-to-shop"><a id="back-to-shop-link" href="{{ route('home') }}">&leftarrow;</a><span
                        class="text-muted">{{ trans('messages.backtoshop') }}</span>
                </div>
                <script>
                    // Get the link element by its ID or another selector
                    var backToShopLink = document.getElementById('back-to-shop-link');

                    // Add a click event handler to the link
                    backToShopLink.addEventListener('click', function(event) {
                        // Prevent the link from navigating to the href
                        event.preventDefault();

                        // Remove the session here
                        fetch('{{ route('clearDiscount') }}', {
                            method: 'POST',
                            headers: {
                                'X-CSRF-TOKEN': '{{ csrf_token() }}',
                            },
                        });

                        // Navigate to the intended URL after removing the session
                        window.location.href = backToShopLink.href;
                    });
                </script>
            </div>
            <div class="col-md-4 summary">
                <div>
                    <h5><b>{{ trans('messages.summary') }}</b></h5>
                </div>
                <hr>
                <div class="row">
                    <div class="col" style="padding-left:0;">{{ trans('messages.items') }} {{ $cartcount }}
                    </div>
                    <div class="col text-right">$ {{ $totalCartPrice }}</div>
                </div>


                <p>{{ trans('messages.entercode') }}</p>
                <form id="discount-form" action="{{ route('applyDiscount') }}" method="post">
                    @csrf
                    <input id="code" name="code" placeholder="{{ trans('messages.entercode') }}">
                    <button class="btn" type="submit">{{ trans('messages.applydiscount') }}</button>
                </form>

                <div class="row" style="border-top: 1px solid rgba(0,0,0,.1);"></div>

                @if ($totalCartPrice > 0)
                    <form id="paypalForm" action="{{ route('checkout') }}" method="post">
                        @csrf

                        <p>{{ trans('messages.email') }}</p>
                        <input type="email" name="email" value="{{ old('email') }}"
                            placeholder="{{ $errors->has('email') ? $errors->first('email') : trans('messages.email') }}">

                        <p>{{ trans('messages.phone') }}</p>
                        <input type="number" name="phone" value="{{ old('phone') }}"
                            placeholder="{{ $errors->has('phone') ? $errors->first('phone') : trans('messages.phone') }}">

                        <p>{{ trans('messages.note') }}</p>
                        <textarea style="width: 240px;height:100px; max-height:100px; min-height: 100px" name="note">{{ old('note') }}</textarea>

                        @if (session('discountAmount'))
                            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                <div class="col">{{ trans('messages.totalprice') }}</div>
                                <div class="col text-right">$ {{ $totalCartPrice }}
                                </div>
                            </div>
                            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                <div class="col">{{ trans('messages.discount') }}</div>
                                <div class="col text-right">$ {{ session('discountAmount') }}</div>
                            </div>
                            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                <div class="col">{{ trans('messages.totalpriceafterdiscount') }}</div>
                                <div class="col text-right">$ {{ $totalCartPrice - session('discountAmount') }}
                                </div>
                            </div>
                        @else
                            <div class="row" style="border-top: 1px solid rgba(0,0,0,.1); padding: 2vh 0;">
                                <div class="col">{{ trans('messages.totalprice') }}</div>
                                <div class="col text-right">$ {{ $totalCartPrice }}</div>
                            </div>
                        @endif
                        <style>
                            .paypal-button {
                                display: inline-block;
                                background-color: #003087;
                                border: none;
                                padding: 10px 20px;
                                border-radius: 5px;
                                text-decoration: none;
                                color: #fff;
                                font-weight: bold;
                                text-align: center;
                                cursor: pointer;
                            }

                            .paypal-button img {
                                width: 50px;
                                /* Adjust the width as needed */
                                vertical-align: middle;
                                margin-right: 10px;
                                /* Add some spacing between the image and text */
                            }
                        </style>



                        <img id="paypalImage" style="width: 270px; text-align: center; cursor: pointer;"
                            src="{{ asset('images/buttonpaypal.png') }}" alt="PayPal" onclick="submitForm()">

                        {{-- <script
                        src="https://www.paypal.com/sdk/js?client-id=AXe-gnUAyTI1WU_z2udPrh4RrZfdmJ7kbV21hJI0AyuIQYbpHc_a0Jr_1naDGM1CCR_rs-ENpjuEI8h7&currency=USD">
                    </script>



                    <div id="paypal-buttons"></div>
                    <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>

                    <script>
                        paypal.Buttons({
                            createOrder: function(data, actions) {
                                // Validate email and phone
                                var email = $('input[name="email"]').val();
                                var phone = $('input[name="phone"]').val();

                                if (!email || !phone) {
                                    // Show an error message and prevent order creation
                                    alert("Please enter both email and phone before proceeding.");
                                    return false;
                                }


                                // Proceed with order creation if validation passes
                                return actions.order.create({
                                    purchase_units: [{
                                        amount: {
                                            currency_code: 'USD',
                                            value: <?php echo $totalCartPrice - session('discountAmount'); ?>
                                        },
                                        address: {
                                            email_address: email,
                                            phone: phone
                                        }

                                    }]
                                });
                            },
                            onApprove: function(data, actions) {
                                return actions.order.capture().then(function(details) {
                                    // Handle the successful payment here
                                    var transactionStatus = details.status;

                                    // Save email, phone, and note to the server using AJAX
                                    var email = $('input[name="email"]').val();
                                    var phone = $('input[name="phone"]').val();
                                    var note = $('textarea[name="note"]').val();

                                    $.ajax({
                                        url: "{{ route('saveOrderInformation') }}",
                                        method: "POST",
                                        data: {
                                            email: email,
                                            phone: phone,
                                            note: note,
                                            _token: "{{ csrf_token() }}"
                                        }
                                    });

                                    // Redirect to the success page with the status parameter
                                    window.location.href = "{{ route('success') }}?token=" + data.orderID +
                                        "&PayerID=" + details.payer.payer_id +
                                        "&status=" + transactionStatus;
                                });
                            }
                        }).render('#paypal-buttons');
                    </script> --}}

                        <script>
                            function submitForm() {
                                // Trigger form submission
                                document.getElementById("paypalForm").submit();
                            }
                        </script>


                    </form>

                @endif


            </div>
        </div>

    </div>
</body>

</html>
