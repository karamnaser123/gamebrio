<aside class="left-sidebar" data-sidebarbg="skin6">
    <!-- Sidebar scroll-->
    <div class="scroll-sidebar">
        <!-- Sidebar navigation-->
        <nav class="sidebar-nav">
            <ul id="sidebarnav">
                <!-- User Profile-->
                <li>
                    <!-- User Profile-->
                    <div class="user-profile d-flex no-block dropdown m-t-20">
                        {{-- <div class="user-pic"><img src="{{ asset('admin/images/users/1.jpg') }}" alt="users"
                                class="rounded-circle" width="40" /></div> --}}
                        <div class="user-content hide-menu m-l-10">
                            <a href="#" class="" id="Userdd" role="button" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">

                                <h5 class="m-b-0 user-name font-medium">{{ auth()->user()->name }}
                                    {{-- <i
                                  class="fa fa-angle-down"></i> --}}
                                </h5>
                                <span class="op-5 user-email">{{ auth()->user()->email }}</span>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end" aria-labelledby="Userdd">
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-user m-r-5 m-l-5"></i>
                                    My Profile</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-wallet m-r-5 m-l-5"></i>
                                    My Balance</a>
                                <a class="dropdown-item" href="javascript:void(0)"><i class="ti-email m-r-5 m-l-5"></i>
                                    Inbox</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="ti-settings m-r-5 m-l-5"></i> Account Setting</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="javascript:void(0)"><i
                                        class="fa fa-power-off m-r-5 m-l-5"></i> Logout</a>
                            </div>
                        </div>
                    </div>
                    <!-- End User Profile-->
                </li>

                <!-- User Profile-->
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('dashboard') }}" aria-expanded="false"><i
                            class="mdi mdi-view-dashboard"></i><span class="hide-menu">Dashboard</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.orders') }}" aria-expanded="false"><i class="mdi mdi-cart"></i><span
                            class="hide-menu">Orders</span></a>
                </li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.games') }}" aria-expanded="false"><i
                            class="mdi mdi-gamepad-variant"></i><span class="hide-menu">Games</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.products') }}" aria-expanded="false"><i
                            class="mdi mdi-gamepad-variant"></i><span class="hide-menu">Products</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.filter') }}" aria-expanded="false"><i class="mdi mdi-filter"></i><span
                            class="hide-menu">Product Filters</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.typegames') }}" aria-expanded="false"><i class="mdi mdi-gamepad"></i><span
                            class="hide-menu">TypeGames</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.discount') }}" aria-expanded="false"><i class="mdi mdi-sale"></i><span
                            class="hide-menu">Discount Codes</span></a></li>
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.users') }}" aria-expanded="false"><i
                            class="mdi mdi-account-multiple"></i><span class="hide-menu">Users</span></a></li>

                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="{{ route('admin.contact') }}" aria-expanded="false"><i class="mdi mdi-contacts"></i><span
                            class="hide-menu">Contact</span></a></li>


                <form method="POST" action="{{ route('logout') }}">
                    @csrf
                    <li class="sidebar-item">
                        <a class="sidebar-link waves-effect waves-dark sidebar-link"
                            style="background-color: transparent; color:black; font-weight: bold "
                            href="{{ route('logout') }}"
                            onclick="event.preventDefault(); this.closest('form').submit();"><i
                                class="mdi mdi-logout"></i><span class="hide-menu">LogOut</span>
                        </a>
                    </li>
                </form>



                {{-- 
                <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                        href="error-404.html" aria-expanded="false"><i class="mdi mdi-alert-outline"></i><span
                            class="hide-menu">404</span></a></li> --}}

            </ul>

        </nav>
        <!-- End Sidebar navigation -->
    </div>
    <!-- End Sidebar scroll-->
</aside>
