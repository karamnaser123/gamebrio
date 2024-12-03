<!-- Font Awesome -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet" />
<!-- Google Fonts -->
<link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap" rel="stylesheet" />
<!-- MDB -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.css" rel="stylesheet" />
<!-- MDB -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdb-ui-kit/6.4.2/mdb.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<header class="header-area header-sticky">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <nav class="main-nav">
                    <!-- ***** Logo Start ***** -->
                    <style>
                        .large-image {
                            width: 100%;
                            max-width: 300px;
                            height: auto;
                        }
                    </style>
                    <a href="{{ route('home') }}" class="logo">
                        <img class="large-image" src="{{ asset('images/logog.png') }}" alt="">
                    </a>

                    <!-- ***** Logo End ***** -->
                    <!-- ***** Menu Start ***** -->
                    <style>
                        @media screen and (max-width: 767px) {
                            .search-box {
                                align-items: center;
                            }

                            #search-input {
                                border: 1px solid #ccc;
                                border-radius: 5px;
                                font-size: 14px;
                                /* Adjust the width as needed */
                            }


                            #search-button {
                                background: #0071f8;
                                /* Button background color */
                                border: none;
                                color: #fff;
                                /* Button text color */
                                border-radius: 5px;
                                cursor: pointer;
                            }
                        }

                        @media screen and (min-width: 768px) {

                            .search-box {
                                display: flex;
                                align-items: center;
                            }

                            #search-input {
                                border: 1px solid #ccc;
                                border-radius: 5px;
                                padding: 10px;
                                font-size: 14px;
                                margin-right: 10px;
                                width: 200px;
                                /* Adjust the width as needed */
                            }

                            #search-button {
                                background: #0071f8;
                                /* Button background color */
                                border: none;
                                color: #fff;
                                /* Button text color */
                                padding: 10px 20px;
                                border-radius: 5px;
                                cursor: pointer;
                            }


                        }

                        #search-input:focus {
                            outline: none;
                            /* Remove the blue outline when the input is focused */
                        }

                        #search-button:hover {
                            background: #0056b3;
                            /* Change the background color on hover */
                        }
                    </style>

                    <ul class="nav">
                        <form action="{{ route('search') }}" method="get">
                            <li class="search-box">
                                <input name="search" type="text" id="search-input"
                                    placeholder="{{ trans('messages.searchnow') }}">
                                <button id="search-button"><i class="fa fa-search"></i></button>

                            </li>
                        </form>
                        <li><a class="nav-links" href="{{ route('home') }}">{{ trans('messages.home') }}</a></li>
                        <li><a class="nav-links" href="{{ route('product') }}">{{ trans('messages.products') }}</a></li>

                        <li><a class="nav-links" href="{{ route('contact') }}">{{ trans('messages.contactus') }}</a>
                        </li>
                        <li><a class="nav-links"
                                href="{{ route('testimonials') }}">{{ trans('messages.testimonials') }}</a></li>

                        <div class="dropdown">
                            <a style="background-color: #0071f8;color: white" class="btn btn-primary dropdown-toggle"
                                href="#" role="button" id="dropdownButton2">
                                {{ trans('messages.languages') }}
                            </a>

                            <ul class="dropdown-menu" id="dropdownMenu2" aria-labelledby="dropdownButton2">
                                <li><a style="color:black;font-weight: bold" class="dropdown-item"
                                        href="{{ route('lang.en') }}"><i style="font-size: 19px" class="fa fa-user"
                                            aria-hidden="true"></i>
                                        English</a></li>
                                <li><a style="color:black;font-weight: bold; background-color: white"
                                        class="dropdown-item" href="{{ route('lang.ar') }}"><i style="font-size: 19px"
                                            class="fa fa-user" aria-hidden="true"></i>
                                        العربية</a></li>

                            </ul>
                            <script>
                                document.addEventListener("DOMContentLoaded", function() {
                                    var isDropdownOpen = false;
                                    var dropdownButton2 = document.getElementById("dropdownButton2");
                                    var dropdownMenu2 = document.getElementById("dropdownMenu2");

                                    dropdownButton2.addEventListener("click", function(e) {
                                        e.stopPropagation(); // Prevent click event from propagating to the document
                                        if (isDropdownOpen) {
                                            dropdownMenu2.style.display = "none";
                                        } else {
                                            dropdownMenu2.style.display = "block";
                                        }
                                        isDropdownOpen = !isDropdownOpen;
                                    });

                                    document.addEventListener("click", function() {
                                        if (isDropdownOpen) {
                                            dropdownMenu.style.display = "none";
                                            isDropdownOpen = false;
                                        }
                                    });

                                    // Prevent the dropdown from closing when clicking inside it
                                    dropdownMenu.addEventListener("click", function(e) {
                                        e.stopPropagation();
                                    });
                                });
                            </script>
                        </div>
                        <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
                        <script>
                            $(document).ready(function() {
                                // Check if there's a stored active link in local storage
                                var activeLink = localStorage.getItem('activeLink');

                                // If an active link is found, add the "active" class
                                if (activeLink) {
                                    $('.nav-links[href="' + activeLink + '"]').addClass('active');
                                }

                                // Click event handler
                                $('.nav-links').click(function() {
                                    // Remove the "active" class from all links
                                    $('.nav-links').removeClass('active');

                                    // Add the "active" class to the clicked link
                                    $(this).addClass('active');

                                    // Store the active link in local storage
                                    localStorage.setItem('activeLink', $(this).attr('href'));
                                });
                            });
                        </script>
                        <hr class="dropdown-divider" />

                        <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

                        <style>
                            @media (max-width: 767px) {

                                /* CSS for mobile devices (phones) */
                                .dropdown {
                                    position: relative;
                                    display: inline-block;
                                }

                                .dropdown .dropdown-menu {
                                    position: static;
                                    top: auto;
                                    bottom: 100%;
                                    left: 0;
                                    display: none;
                                    background-color: #fff;
                                    border: 1px solid #ccc;
                                    z-index: 999;
                                }

                                .dropdown:hover .dropdown-menu {
                                    display: block;
                                }
                            }
                        </style>


                        <script>
                            document.addEventListener("DOMContentLoaded", function() {
                                var isDropdownOpen = false;
                                var dropdownButton = document.getElementById("dropdownButton");
                                var dropdownMenu = document.getElementById("dropdownMenu");

                                dropdownButton.addEventListener("click", function(e) {
                                    e.stopPropagation(); // Prevent click event from propagating to the document
                                    if (isDropdownOpen) {
                                        dropdownMenu.style.display = "none";
                                    } else {
                                        dropdownMenu.style.display = "block";
                                    }
                                    isDropdownOpen = !isDropdownOpen;
                                });

                                document.addEventListener("click", function() {
                                    if (isDropdownOpen) {
                                        dropdownMenu.style.display = "none";
                                        isDropdownOpen = false;
                                    }
                                });

                                // Prevent the dropdown from closing when clicking inside it
                                dropdownMenu.addEventListener("click", function(e) {
                                    e.stopPropagation();
                                });
                            });
                        </script>


                        @if (Auth::check())
                            <div class="dropdown">
                                <a style="background-color: #0071f8;color: white"
                                    class="btn btn-primary dropdown-toggle" href="#" role="button"
                                    id="dropdownButton">
                                    {{ trans('messages.settings') }}
                                </a>

                                <ul class="dropdown-menu" id="dropdownMenu" aria-labelledby="dropdownButton">
                                    <li><a style="color:black;font-weight: bold" class="dropdown-item"
                                            href="{{ route('profile.edit') }}"><i style="font-size: 19px"
                                                class="fa fa-user" aria-hidden="true"></i>
                                            {{ trans('messages.profile') }}</a></li>
                                    <hr class="dropdown-divider" />


                                    <li>
                                        <style>
                                            .cart-count {
                                                background-color: #ff0000;
                                                /* Background color for the count */
                                                color: #fff;
                                                /* Text color for the count */
                                                border-radius: 50%;
                                                /* Make it a circle */
                                                padding: 2px 6px;
                                                /* Adjust padding as needed */
                                                margin-left: 5px;
                                                /* Add spacing between the count and the cart icon */
                                            }
                                        </style>
                                        <a style="color: black; font-weight: bold" class="dropdown-item"
                                            href="{{ route('cart') }}">
                                            <i style="font-size: 19px" class="fa fa-shopping-cart"
                                                aria-hidden="true"></i>
                                            {{ trans('messages.cart') }}
                                            <span id="cart-count" class="cart-count"></span>
                                        </a>
                                    </li>
                                    <hr class="dropdown-divider" />
                                    <li><a style="color:black; font-weight: bold " class="dropdown-item"
                                            href="{{ route('my-orders') }}"><span class="material-icons">
                                                inventory
                                            </span>
                                            {{ trans('messages.myorders') }}</a>
                                    </li>

                                    <hr class="dropdown-divider" />
                                    <li>
                                        <form method="POST" action="{{ route('logout') }}">
                                            @csrf
                                            <a class="dropdown-item"
                                                style="background-color: transparent; color:black; font-weight: bold "
                                                href="{{ route('logout') }}"
                                                onclick="event.preventDefault(); this.closest('form').submit();"><i
                                                    style="font-size: 19px" class="fa fa-sign-out"
                                                    aria-hidden="true"></i>
                                                {{ trans('messages.logout') }}</a>
                                        </form>
                                    </li>

                                </ul>
                            </div>
                        @else
                            <li>
                                <a href="{{ route('login') }}">{{ trans('messages.login') }}</a>
                            </li>
                        @endif

                        {{-- <li><a href="#">Sign In</a></li> --}}
                    </ul>
                    <a class='menu-trigger'>
                        <span>Menu</span>
                    </a>
                    <!-- ***** Menu End ***** -->
                </nav>
            </div>
        </div>
    </div>
</header>
