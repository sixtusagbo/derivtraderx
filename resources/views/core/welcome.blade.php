@extends('layouts.core')

@section('content')
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

    <section class="profit-checker py-5 text-light" id="profit-checker">
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
            <h2 class="text-uppercase text-light fs-1 fw-bold features-title">Fe<span class="text-primary">at</span>ure
            </h2>
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
@endsection
