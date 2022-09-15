<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    {{-- TODO: Update this on deployment --}}
    <meta name="description" content="An investment platform.">
    <meta name="keywords" content="investment,invest,crypto,ethereum,bitcoin,bnb">
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
    <!-- Favicon -->
    <link rel="shortcut icon" href="{{ asset('favicon.ico') }}" type="image/x-icon">
    <!-- Custom styles -->
    <link rel="stylesheet" href="{{ asset('css/dashboard.css') }}">
</head>

<body class="darkmode">
    <div class="layer"></div>
    <main class="page-center">
        <article class="sign-up">
            @yield('content')
        </article>
    </main>

    <!-- Chart library -->
    <script src="{{ asset('plugins/chart.min.js') }}"></script>
    <!-- Icons library -->
    <script src="{{ asset('plugins/feather.min.js') }}"></script>
    <!-- Custom scripts -->
    <script src="{{ asset('js/dashboard.js') }}"></script>
</body>

</html>
