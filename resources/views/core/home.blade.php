@extends('layouts.core')

@section('content')

    <!-- Hero -->
    <div class="hero">
        <!-- Node Particles -->
        <div id="particles-js">
        </div>

        <div class="hero-content">
            <h2 class="fw-bold text-light">Professional</h2>
            <h1 class="fw-bold text-primary">Asset Management</h1>
            <p class="fs-4">Up to 20% daily earnings, Instant withdrawal. Payments are in your account regularly!</p>
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

    <section class="how-it-works py-2 px-5">
        <h3 class="how-it-works-title text-light fw-bold text-center"> HOW MINING WORKS </h3>

        <div class="ratio ratio-21x9">
            <iframe src="https://www.youtube.com/embed/kZXXDp0_R-w" frameborder="0" allowfullscreen></iframe>
        </div>
    </section>
@endsection

@section('scripts')
    <!-- Google Translate Scripts -->
    <script type="text/javascript">
        function googleTranslateElementInit() {
            new google.translate.TranslateElement({
                pageLanguage: 'en'
            }, 'google_translate_element');
        }
    </script>

    <script type="text/javascript" src="//translate.google.com/translate_a/element.js?cb=googleTranslateElementInit">
    </script>

    <!--Start of Tawk.to Script-->
    <script type="text/javascript">
        var Tawk_API = Tawk_API || {},
            Tawk_LoadStart = new Date();
        (function() {
            var s1 = document.createElement("script"),
                s0 = document.getElementsByTagName("script")[0];
            s1.async = true;
            s1.src = 'https://embed.tawk.to/62018946b9e4e21181bdeb32/1frb00fok';
            s1.charset = 'UTF-8';
            s1.setAttribute('crossorigin', '*');
            s0.parentNode.insertBefore(s1, s0);
        })();
    </script>
    <!--End of Tawk.to Script-->
@endsection
