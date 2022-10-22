<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="An investment platform">
    <meta name="keywords" content="derivtraderx, dtx, trade, forex, crypto, investment, invest, bitcoin, ethereum">

    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="{{ url('/') }}">
    <meta property="og:title" content="DTX">
    <meta property="og:description" content="An investment platform">
    <meta property="og:image" content="{{ asset('images/welcome_banner.jpg') }}">
    <!-- Twitter -->
    <meta property="twitter:card" content="website">
    <meta property="twitter:url" content="{{ url('/') }}">
    <meta property="twitter:title" content="DTX">
    <meta property="twitter:description" content="An investment platform">
    <meta property="twitter:image" content="{{ asset('images/welcome_banner.jpg') }}">

    <title>{{ config('app.name', 'DTX') }}</title>
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">

</head>

<body>
    <div class="layer"></div>
    <!-- ! Body -->
    <a class="skip-link sr-only" href="#skip-target">Skip to content</a>
    <div class="page-flex">
        <!-- ! Sidebar -->
        <aside class="sidebar">
            <div class="sidebar-start">
                <div class="sidebar-head">
                    <a href="/" class="logo-wrapper" title="Home">
                        <span class="sr-only">Home</span>
                        <img class="icon me-2" aria-hidden="true" src="{{ asset('images/logo_white.png') }}"
                            height="49" width="54">
                        <div class="logo-text">
                            <span class="logo-title">Deriv</span>
                            <span class="logo-subtitle">Traderx</span>
                        </div>

                    </a>
                    <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                        <span class="sr-only">Toggle menu</span>
                        <span class="icon menu-toggle" aria-hidden="true"></span>
                    </button>
                </div>
                <div class="sidebar-body">
                    <ul class="sidebar-body-menu">
                        <li>
                            <a class="active" href="/home"><span class="icon home"
                                    aria-hidden="true"></span>Dashboard</a>
                        </li>
                        <li>
                            <a class="show-cat-btn" href="">
                                <span class="icon user-3" aria-hidden="true"></span>Users
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="{{ url('/users') }}">Normal Users</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admins') }}">Admin Users</a>
                                </li>
                            </ul>
                        </li>
                        <li>
                            <a class="show-cat-btn" href="">
                                <span class="icon" data-feather="archive" aria-hidden="true"></span> Withdrawal
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="{{ route('withdrawal_addresses.index') }}">Addresses</a>
                                </li>
                                <li>
                                    <a href="{{ route('withdrawals.index') }}">Requests</a>
                                </li>

                            </ul>
                        </li>

                        <li>
                            <a class="show-cat-btn" href="">
                                <span class="icon" data-feather="credit-card" aria-hidden="true"></span> Payments
                                <span class="category__btn transparent-btn" title="Open list">
                                    <span class="sr-only">Open list</span>
                                    <span class="icon arrow-down" aria-hidden="true"></span>
                                </span>
                            </a>
                            <ul class="cat-sub-menu">
                                <li>
                                    <a href="{{ url('/admin/payment') }}">Manage Payment</a>
                                </li>
                                <li>
                                    <a href="{{ url('/payment_address') }}">Payment Address</a>
                                </li>
                                <li>
                                    <a href="{{ url('/admin/payment/history') }}">Payment History</a>
                                </li>
                                <li><a href="{{ url('/admin/investment_plans') }}">Investment Plans</a>
                                </li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="sidebar-footer">
                <a href="" class="sidebar-user">
                    <span class="sidebar-user-img bg-success d-flex justify-content-center align-items-center">
                        <i data-feather="user" aria-hidden="true"></i>
                    </span>
                    <div class="sidebar-user-info">
                        <span class="sidebar-user__title">{{ Auth()->user()->username }}</span>
                        <span class="sidebar-user__subtitle">
                            @if (Auth()->user()->type == 1)
                                Admin
                            @else
                                Member
                            @endif
                        </span>
                    </div>
                </a>
            </div>
        </aside>
        <div class="main-wrapper">
            <!-- ! Main nav -->
            <nav class="main-nav--bg">
                <div class="container main-nav">
                    <div class="main-nav-start">

                    </div>
                    <div class="main-nav-end">
                        <button class="sidebar-toggle transparent-btn" title="Menu" type="button">
                            <span class="sr-only">Toggle menu</span>
                            <span class="icon menu-toggle--gray" aria-hidden="true"></span>
                        </button>
                        <button class="theme-switcher gray-circle-btn" type="button" title="Switch theme">
                            <span class="sr-only">Switch theme</span>
                            <i class="sun-icon" data-feather="sun" aria-hidden="true"></i>
                            <i class="moon-icon" data-feather="moon" aria-hidden="true"></i>
                        </button>
                        <div class="notification-wrapper">
                            <button class="gray-circle-btn dropdown-btn" title="To messages" type="button">
                                <span class="sr-only">To messages</span>
                                <span class="icon notification active" aria-hidden="true"></span>
                            </button>
                            <ul class="item-dropdown notification-dropdown dropdown">
                                <li>
                                    <a class="link-to-page">No messages yet</a>
                                </li>
                            </ul>
                        </div>
                        <div class="nav-user-wrapper">
                            <button href="" class="nav-user-btn dropdown-btn" title="My profile"
                                type="button">
                                <span class="sr-only">My profile</span>
                                <span class="nav-user-img bg-success">
                                    <i data-feather="user" aria-hidden="true"></i>
                                </span>
                            </button>
                            <ul class="item-dropdown nav-user-dropdown dropdown">
                                <li>
                                    <a class="danger" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                     document.getElementById('logout-form').submit();">
                                        <i data-feather="log-out" aria-hidden="true"></i>
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST"
                                        class="d-none">
                                        @csrf
                                    </form>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </nav>

            <!-- ! Main -->
            @include('inc.messages')
            <main class="main" id="skip-target">
                <div class="container">
                    @yield('content')
                </div>
            </main>

            <!-- ! Footer -->
            <footer class="footer">
                <div class="container footer--flex">
                    <div class="footer-start">
                        <p>2022 &copy; Derivtraderx</p>
                    </div>
                    <ul class="footer-end">
                        <li><a href="{{ url('/') }}">Home</a></li>
                    </ul>
                </div>
            </footer>
        </div>
    </div>

    <!-- Chart library -->
    <script src="{{ asset('plugins/chart.min.js') }}"></script>
    <!-- Icons library -->
    <script src="{{ asset('plugins/feather.min.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('js/dashboard.js') }}"></script>

</body>

</html>
