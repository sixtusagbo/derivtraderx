<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    {{-- TODO: Update this on deployment --}}
    <meta name="description" content="An investment platform.">
    <meta name="keywords" content="investment,invest,crypto,ethereum,bitcoin,bnb">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <!-- Open Graph / Facebook -->
    <meta property="og:type" content="website">
    <meta property="og:url" content="https://derivtraderx.com">
    <meta property="og:title" content="DTX">
    <meta property="og:description" content="An investment platform.">
    <meta property="og:image" content="https://derivtraderx.com/images/banner.jpg">
    <!-- Twitter -->
    <meta property="twitter:card" content="website">
    <meta property="twitter:url" content="https://derivtraderx.com">
    <meta property="twitter:title" content="DTX">
    <meta property="twitter:description" content="An investment platform.">
    <meta property="twitter:image" content="https://derivtraderx.com/images/banner.jpg">


    <title>{{ config('app.name', 'DTX') }}</title>

    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('plugin/icons.min.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css?v=') . time() }}">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body>
    @include('shared.loader')
    <div class="container-fluid header px-5">
        <header class="d-flex flex-wrap justify-content-center py-4 px-5 mb-4">
            <a href="../../../../index.html"
                class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
                <img src="{{ asset('images/logo.png') }}" alt="" width="35px">
                <span class="fs-4 text-light ms-2 fw-bold">Deriv Traderx</span>
            </a>

            <ul class="nav nav-pills">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link text-light"
                        aria-current="page">Home</a></li>
                <li class="nav-item"><a href="" class="nav-link text-light">About Us</a></li>
                <li class="nav-item"><a href="" class="nav-link text-light">FAQ</a></li>
                <li class="nav-item"><a href="" class="nav-link text-light">Contacts</a></li>
                <li class="nav-item"><a href="" class="nav-link text-light">Login</a></li>
                <a href="{{ route('register') }}" class="btn ml-lg-auto dark-button">Register</a>
            </ul>
        </header>
    </div>

    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('plugin/jquery.js') }}"></script>
    <script src="{{ asset('js/app.js?v=') . time() }}"></script>
</body>

</html>
