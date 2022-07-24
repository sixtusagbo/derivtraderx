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
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('plugin/aos.css') }}">
    <link rel="stylesheet" href="{{ asset('css/app.css?v=') . time() }}">
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>

<body data-aos-easing="ease">
    @include('shared.loader')
    @include('shared.header')

    @yield('content')

    <!-- Scripts -->
    <script src="{{ asset('plugin/jquery.js') }}"></script>
    <script src="{{ asset('plugin/particles.min.js') }}"></script>
    <script src="{{ asset('plugin/aos.js') }}"></script>
    <script src="{{ asset('js/app.js?v=') . time() }}"></script>
    @yield('scripts')
</body>

</html>
