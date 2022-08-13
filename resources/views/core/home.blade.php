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

        <!-- Pricing section -->
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

        <section class="statistics my-3 py-5 px-4" id="stats">
            <div class="row d-flex justify-content-center align-items-center text-center text-light p-5">
                <div class="col-md-6 col-lg-3 mb-3">
                    <span class="material-icons fs-1">network_check</span>
                    <div id="days" class="fs-1">4302</div>
                    <p class="text-primary">Days Online</p>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <span class="material-icons fs-1">people</span>
                    <div id="members" class="fs-1">3049212</div>
                    <p class="text-primary">Registered Members</p>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <span class="material-icons fs-1">account_balance_wallet</span>
                    <div id="money" class="fs-1">53600.34</div>
                    <p class="text-primary">Current Deposits</p>
                </div>
                <div class="col-md-6 col-lg-3 mb-3">
                    <span class="material-icons fs-1">payments</span>
                    <div id="money2" class="fs-1">5432923.85</div>
                    <p class="text-primary">Total Withdrawals</p>
                </div>
            </div>
        </section>

        <section class="structure my-3">
            <div class="text-center">
                <h2 class="text-uppercase text-primary fs-2 fw-bold">Where does it emanate from?</h2>
                <p class="fs-5">The secret to our success comes from our expert teammates and our advancement in
                    technology.</p>
            </div>

            <div class="row mt-3 gy-4">
                <div class="col-lg-6 mx-auto">
                    <img src="{{ asset('images/inside_dashboard.png') }}" alt="Mobile App Dashboard" class="img-fluid">
                </div>
                <div class="col-lg-6">
                    <div class="row mb-3">

                        <div class="col-1">
                            <span class="material-icons text-primary">fact_check</span>
                        </div>

                        <div class="col-xl-10 col-md-11 col-10">
                            <h5 class="fs-3 fw-bold text-light text-uppercase">Technology</h5>
                            <p class="fs-5 fw-lighter">Enjoy an impeccable investment experience thanks to the attractive
                                interface and simple solutions used by microminers.ltd for customer comfort and revenue
                                protection</p>
                        </div>

                    </div>

                    <div class="row">

                        <div class="col-1">
                            <span class="material-icons text-primary">fact_check</span>
                        </div>

                        <div class="col-xl-10 col-md-11 col-10">
                            <h5 class="fs-3 fw-bold text-light text-uppercase">Finance</h5>
                            <p class="fs-5 fw-lighter">We administer the platform and manage investor assets at the same
                                professional level as we develop algorithms and trade on cryptocurrency exchanges.</p>
                        </div>

                    </div>
                </div>
            </div>
        </section>

        <section id="features" class="features my-3">
            <div class="text-center mb-3">
                <h2 class="text-uppercase text-light fs-1 fw-bold features-title">Fe<span
                        class="text-primary">at</span>ure</h2>
            </div>

            <div class="row justify-content-center text-center g-5">
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card feature">
                        <span class="material-icons text-primary display-5">language</span>
                        <h4 class="text-light fw-bold">Forex Trading</h4>
                        <p class="text-wrap">We share with you all the income we earn by trading in Forex to grow.</p>
                        <br>
                        <a href="{{ route('register') }}" class="stretched-link"><span
                                class="material-icons">navigate_next</span></a>
                    </div>
                </div>

                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card feature">
                        <span class="material-icons text-primary display-5">insights</span>
                        <h4 class="text-light fw-bold">Stock Market</h4>
                        <p class="text-wrap">Our professional team achieves success by being managed by experts.</p>
                        <a href="{{ route('register') }}" class="stretched-link"><span
                                class="material-icons">navigate_next</span></a>
                    </div>
                </div>
                <div class="col-12 col-md-6 col-lg-4">
                    <div class="card feature">
                        <span class="material-icons text-primary display-5">local_police</span>
                        <h4 class="text-light fw-bold">Security</h4>
                        <p class="text-wrap">Our prime brokerage group monitor portfolio, maintain liquidity, manage risk.
                        </p>
                        <a href="{{ route('register') }}" class="stretched-link"><span
                                class="material-icons">navigate_next</span></a>
                    </div>
                </div>
            </div>
        </section>

        <section id="affiliates" class="affiliates mt-4 p-3">
            <img src="{{ asset('images/affiliate_bg.png') }}" alt="" class="img-fluid bg-shape">
            <div class="row">
                <div class="col-xl-6 text-start">
                    <h2 class="text-primary fw-normal text-uppercase">Affiliate Program</h2>
                    <h4 class="text-light fw-bold text-uppercase">Increase your profit</h4>

                    <p class="fs-5 fw-lighter">Invite your friends to our project and earn extra money by advertising. We
                        offer 3-level referral
                        program with 5%-3%-1% comission.</p>
                </div>
                <div class="col-xl-6">
                    <div class="row">
                        <div class="col-md-6 col-lg-6">
                            <div class="affiliates-card text-center mb-3 lh-lg">
                                <span class="material-icons text-primary display-5">person_add_alt</span>
                                <p class="fw-bold text-light fs-6 text-uppercase">Enjoy unlimited</p>
                                <h3 class="text-primary text-uppercase fs-4 fw-bold">Commissions</h3>
                                <p>The more User you refer, the more commissions we&apos;ll pay you. Plain and simple.</p>
                                <a href="{{ route('register') }}" class="stretched-link"><span
                                        class="material-icons">navigate_next</span></a>
                            </div>
                        </div>
                        <div class="col-md-6 col-lg-6">
                            <div class="affiliates-card text-center lh-lg">
                                <span class="material-icons text-primary display-5">currency_exchange</span>
                                <p class="fw-bold text-light fs-6 text-uppercase">Extra Bonus and</p>
                                <h3 class="text-primary text-uppercase fs-4 fw-bold">Promotions</h3>
                                <p>Boost your monthly earnings with additional promotional opportunities.</p>
                                <a href="{{ route('register') }}" class="stretched-link"><span
                                        class="material-icons">navigate_next</span></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>

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
                                <a href="mailto:support@derivtraderx.com" class="link-secondary text-decoration-none">
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
                <a href="{{ url('terms') }}" class="link-primary text-decoration-none">Terms & conditions</a>

                <p>&copy; 2022 All Rights Reserved | <a href="{{ url('/') }}"
                        class="link-primary text-decoration-none">DerivTraderx</a>
                </p>
            </div>
        </div>
    </footer>
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
