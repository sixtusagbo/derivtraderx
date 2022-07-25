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
            <p class="fs-4 text-center">Up to 20% daily earnings, Instant withdrawal. Payments are in your account regularly!
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

    <div class="d-flex flex-column justify-content-center container">
        <section class="how-it-works py-2">
            <h3 class="how-it-works-title text-light fw-bold text-center"> HOW MINING WORKS </h3>

            <div class="ratio ratio-21x9">
                <iframe src="https://www.youtube.com/embed/kZXXDp0_R-w" frameborder="0" allowfullscreen></iframe>
            </div>
        </section>

        <section class="mt-5">
            <div class="row">
                <div class="col-12">
                    <div class="investment">
                        <div class="investment-head">Investment<span>Plans</span></div>
                        <div class="investment-desc">
                            <span class="fw-bold">Derivtraderx</span> provides high pofitable investment plans. Customers
                            can
                            choose
                            different investment
                            plans for rewarding asset management. Our customers can earn passive income without any trading
                            knowledge.
                        </div>
                    </div>
                </div>
            </div>

            <div class="row py-4">
                <div class="col-lg-12">
                    <div class="owl-carousel">

                        <div class="pricingTable">
                            <div class="pricingTable-header">
                                <h3 class="title">Starter</h3>
                                <div class="price-value">
                                    <span class="amount">20%</span>
                                    <span class="duration">per day</span>
                                </div>
                            </div>
                            <ul class="pricing-content">
                                <li>Minimum - $50.00</li>
                                <br>
                                <li>Always on server</li>
                                <br>
                                <li>Duration - 24hrs</li>
                                <br>
                            </ul>
                            <div class="pricingTable-signup">
                                <a href="{{ route('register') }}">Sign Up</a>
                            </div>
                        </div>
                        <div class="pricingTable blue">
                            <div class="pricingTable-header">
                                <h3 class="title">Elite</h3>
                                <div class="price-value">
                                    <span class="amount">50%</span>
                                    <span class="duration">per day</span>
                                </div>
                            </div>
                            <ul class="pricing-content">
                                <li>Minimum - $500.00</li>
                                <br>
                                <li>Always on server</li>
                                <br>
                                <li>Duration - 48hrs</li>
                                <br>
                            </ul>
                            <div class="pricingTable-signup">
                                <a href="{{ route('register') }}">Sign Up</a>
                            </div>
                        </div>
                        <div class="pricingTable orange">
                            <div class="pricingTable-header">
                                <h3 class="title">Premium</h3>
                                <div class="price-value">
                                    <span class="amount">80%</span>
                                    <span class="duration">per day</span>
                                </div>
                            </div>
                            <ul class="pricing-content">
                                <li>Minimum - $1,000.00</li>
                                <br>
                                <li>Always on server</li>
                                <br>
                                <li>Duration - 72hrs</li>
                                <br>
                            </ul>
                            <div class="pricingTable-signup">
                                <a href="{{ route('register') }}">Sign Up</a>
                            </div>
                        </div>
                        <div class="pricingTable goldie">
                            <div class="pricingTable-header">
                                <h3 class="title">Platinum</h3>
                                <div class="price-value">
                                    <span class="amount">150%</span>
                                    <span class="duration">per day</span>
                                </div>
                            </div>
                            <ul class="pricing-content">
                                <li>Minimum - $5,000.00</li>
                                <br>
                                <li>Always on server</li>
                                <br>
                                <li>Duration - 1wk</li>
                                <br>
                            </ul>
                            <div class="pricingTable-signup">
                                <a href="{{ route('register') }}">Sign Up</a>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section class="profit-checker py-5 text-light">
            <h3 class="profit-checker-title fw-bold text-left"> Check your <span>profit</span> </h3>

            <form class="row g-5 profit-checker-form">
                <div class="col">
                    <label for="plan">Pick a plan</label>
                    <select class="form-select plan-select" id="plan">
                        <option data-duration="24" data-min="50" data-max="499" data-percent="20" selected>Starter</option>
                        <option data-duration="48" data-min="500" data-max="999" data-percent="50">Elite</option>
                        <option data-duration="72" data-min="1000" data-max="4999" data-percent="80">Premium</option>
                        <option data-duration="168" data-min="5000" data-max="100000" data-percent="150">Platinum</option>
                    </select>
                </div>
                <div class="col">
                    <label for="amount">Deposit amount</label>
                    <div class="input-group mb-3">
                        <span class="input-group-text">$</span>
                        <input type="text" class="form-control" id="plan-amount" value="50">
                        <span class="input-group-text">.00</span>
                        <div class="invalid-feedback">Please enter a valid amount.</div>
                    </div>
                </div>
            </form>

            <table class="table table-dark table-responsive results-table">
                <thead>
                    <tr>
                        <th scope="col">Profit</th>
                        <th scope="col">Monthly Profit</th>
                        <th scope="col">Annual Profit</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td id="profit-result">$10.00</td>
                        <td id="monthly-result">$300.00</td>
                        <td id="annual-result">$3,650.00</td>
                    </tr>
                </tbody>

            </table>
        </section>

    </div>
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
