<!doctype html>
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
    <link rel="stylesheet" href="{{ asset('plugins/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ asset('plugins/aos.css') }}">
    @yield('styles')
    <link rel="stylesheet" href="{{ asset('css/app.css?v=') . time() }}">
</head>

<body data-aos-easing="ease">
    @include('shared.loader')
    @include('shared.header')

    <!-- Hero -->
    <div class="hero">
        <!-- Node Particles -->
        <div id="particles-js">
        </div>

        <div class="hero-content">
            <h2 class="fw-bold text-light">Professional</h2>
            <h1 class="fw-bold text-primary">Asset Management</h1>
            <p class="fs-4 text-center">Up to 20% daily earnings, Instant withdrawal. Payments are in your account
                regularly!
            </p>
            @if (Route::has('login'))
                <div class="auth-buttons">
                    @auth
                        <a href="{{ url('/home') }}" class="btn btn-primary">Dashboard</a>
                    @else
                        <a href="{{ route('login') }}" class="btn btn-outline-primary">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="btn btn-primary">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </div>
    <!-- Hero END -->

    <!-- TradingView Widget BEGIN -->
    <div class="tradingview-widget-container">
        <div class="tradingview-widget-container__widget"></div>
        <script type="text/javascript" src="https://s3.tradingview.com/external-embedding/embed-widget-tickers.js" async>
            {
                "symbols": [{
                    "description": "BTC/USD",
                    "proName": "BITSTAMP:BTCUSD"
                }, {
                    "description": "ETH/USD",
                    "proName": "KRAKEN:ETHUSD"
                }, {
                    "description": "LTC/USD",
                    "proName": "KRAKEN:LTCUSD"
                }, {
                    "description": "BNB/USD",
                    "proName": "BINANCE:BNBUSD"
                }, {
                    "description": "DOGE/USD",
                    "proName": "BITTREX:DOGEUSD"
                }, {
                    "description": "TRX/USDT",
                    "proName": "BINGX:TRXUSDT"
                }],
                "showSymbolLogo": true,
                "colorTheme": "dark",
                "isTransparent": true,
                "displayMode": "adaptive",
                "locale": "en"
            }
        </script>
    </div>
    <!-- TradingView Widget END -->

    <!-- Google Translate -->
    <div id="google_translate_element"></div>

    @yield('content')

    <section class="pre-footer">
        <div class="container">
            <div class="accepted-methods d-flex justify-content-evenly py-4">
                <img src="{{ asset('images/supported-systems/bitcoin.svg') }}" alt="">
                <img src="{{ asset('images/supported-systems/ethereum.svg') }}" alt="">
                <img src="{{ asset('images/supported-systems/litecoin.svg') }}" alt="">
                <img src="{{ asset('images/supported-systems/bnb.png') }}" alt="" height="24"
                    width="88">
                <img src="{{ asset('images/supported-systems/doge.png') }}" alt="" height="24"
                    width="88">
                <img src="{{ asset('images/supported-systems/tron.svg') }}" alt="" height="24"
                    width="88">
                <img src="{{ asset('images/supported-systems/perfect_money.svg') }}" alt="">
            </div>

            <div class="more-info mt-3">
                <div class="row text-left py-4">
                    <div class="col-lg-3">
                        <p class="fs-5 lead">Most profitable investment platform.</p>
                    </div>
                    <div class="col-lg-3">
                        <h4 class="fs-2 fw-bold text-light mb-4">Get in Touch</h4>

                        <ul class="navbar-nav d-flex justify-content-center">
                            <li class="nav-item">
                                <a href="tel:" class="link-secondary text-decoration-none"> <span
                                        class="material-icons fs-5">call</span> Whatsapp </a>
                            </li>
                            <li class="nav-item">
                                <a href="mailto:support@derivtraderx.com" class="link-secondary text-decoration-none">
                                    <span class="material-icons fs-5">email</span> support@derivtraderx.com </a>
                            </li>
                            <li class="nav-item">
                                <a href="https://goo.gl/maps/QUJyWa2A1KH5kQYR7" target="_blank"
                                    class="link-secondary text-decoration-none">
                                    <span class="material-icons fs-5">location_on</span> 8564 Sumac Dr
                                    Baldwinsville, New York(NY), 13027 </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h4 class="fs-2 fw-bold text-light mb-4">Quick Links</h4>

                        <ul class="navbar-nav d-flex justify-content-center">
                            <li class="nav-item">
                                <a href="{{ url('/') }}" class="link-secondary text-decoration-none"> <span
                                        class="material-icons fs-5">home</span> Home </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('about') }}" class="link-secondary text-decoration-none"> <span
                                        class="material-icons fs-5">info</span> About Us </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ url('faq') }}" class="link-secondary text-decoration-none"> <span
                                        class="material-icons fs-5">help</span> FAQ </a>
                            </li>
                        </ul>
                    </div>
                    <div class="col-lg-3">
                        <h4 class="fs-2 fw-bold text-light mb-4">Help Desk</h4>

                        <ul class="navbar-nav d-flex justify-content-center">
                            <li class="nav-item">
                                <a href="{{ url('contact') }}" class="link-secondary text-decoration-none"> <span
                                        class="material-icons fs-5">perm_contact_calendar</span> Contact </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('login') }}" class="link-secondary text-decoration-none"> <span
                                        class="material-icons fs-5">login</span> Login </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('register') }}" class="link-secondary text-decoration-none"> <span
                                        class="material-icons fs-5">how_to_reg</span> Sign Up </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <footer>
        <div class="container">
            <div class="d-flex justify-content-between py-4 bg-dark">
                <a href="{{ route('policy') }}" class="link-primary text-decoration-none">Terms & conditions</a>

                <p>&copy; 2022 All Rights Reserved | <a href="{{ url('/') }}"
                        class="link-primary text-decoration-none">DerivTraderx</a>
                </p>
            </div>
        </div>
    </footer>

    <!-- Scripts -->
    <!--[if lt IE 9]>
        <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
        <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
    <script src="{{ asset('plugins/jquery.js') }}"></script>
    <script src="{{ asset('plugins/particles.min.js') }}"></script>
    <script src="{{ asset('plugins/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('plugins/aos.js') }}"></script>
    <script src="{{ asset('js/app.js?v=') . time() }}"></script>
    @include('shared.other_scripts')
    @yield('scripts')
</body>

</html>
