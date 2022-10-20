@extends('layouts.core')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/swiper-bundle.min.css') }}">
@endsection

@section('content')
    <div class="container">
        <div class="left-decked-title">
            <h4 class="text-primary mt-3">About</h4>
            <h1 class="text-light display-5 fw-bold">COMPANY</h1>
        </div>

        <div class="py-5">
            <p class="mb-5">
                Derivtraderx is an international financial organization. Deriv
                Group's operational headquarters is located in Cyberjaya and is home to a majority of teams such as Back-end
                and Front-end, IT Operations, Customer Support, Compliance, Marketing, Trading, Business Intelligence, and
                Human Resources, to name a few.
            </p>

            <p class="mb-5">
                Derivtraderx works with a team of experts in cryptocurrency trading, arbitrage and trade in the forex
                market. We
                guarantee stable profits to our investors. The company has strong capital and the capital owned by our
                company
                is guaranteed for investors.
            </p>

            <p>
                You are able to earn money without making any risky decision. We have developed a system that guarantees
                constant passive income in 5 investment plans and these plans are at least 24hrs. After you making a
                deposit,
                you are able to earn by 10% to 50% passive income per plan duration till end of the term of your contracts.
            </p>
        </div>

        <section class="office-showcase py-3">
            <h3 class="text-light fs-2 mb-5 text-center office-showcase-title">Our <span class="text-primary">Office</span>
            </h3>

            <!-- Swiper -->
            <div class="swiper mySwiper">
                <div class="swiper-wrapper">
                    <div class="swiper-slide"><img src="{{ asset('images/office-showcase/9.jpg') }}" alt="our-office-1">
                    </div>
                    <div class="swiper-slide"><img src="{{ asset('images/office-showcase/2.jpg') }}" alt="our-office-2">
                    </div>
                    <div class="swiper-slide"><img src="{{ asset('images/office-showcase/7.jpg') }}" alt="our-office-3">
                    </div>
                    <div class="swiper-slide"><img src="{{ asset('images/office-showcase/4.jpg') }}" alt="our-office-4">
                    </div>
                    <div class="swiper-slide"><img src="{{ asset('images/office-showcase/5.jpg') }}" alt="our-office-5">
                    </div>
                    <div class="swiper-slide"><img src="{{ asset('images/office-showcase/6.jpg') }}" alt="our-office-6">
                    </div>
                    <div class="swiper-slide"><img src="{{ asset('images/office-showcase/1.jpg') }}" alt="our-office-7">
                    </div>
                    <div class="swiper-slide"><img src="{{ asset('images/office-showcase/8.jpg') }}" alt="our-office-8">
                    </div>
                    <div class="swiper-slide"><img src="{{ asset('images/office-showcase/2.jpg') }}" alt="our-office-9">
                    </div>
                </div>
                <div class="swiper-pagination"></div>
            </div>
        </section>

        <section class="about-ceo my-3">
            <div class="row">
                <div class="col-lg-8 text-center">
                    <h3 class="text-light display-6 fw-bold">Our CEO</h3>

                    <div class="my-3">
                        <p class="mb-3">Jean-Yves Sireau is the founder and CEO of Deriv, an online trading broker founded
                            in 1999. The company has become one of the world&apos;s largest online brokers, offering a wide
                            range
                            of CFD and other derivative contracts on forex, stocks, and synthetic indices to over a million
                            clients worldwide. Now a global company, Deriv Group Ltd has over 580 employees across 10
                            offices
                            worldwide.</p>
                        <p class="mb-3">In 1997, Jean-Yves started working on the systems and algorithms that became the
                            foundation of Deriv. Today, after more than 20 years and with over USD 3 billion in turnover,
                            Deriv Group continues on its journey of innovation to give clients access to a wide range of
                            contracts, markets, and apps to trade.</p>
                        <p class="mb-3">Deciding to offer trading platforms that provide a simple, reliable, adnd flexible
                            trading
                            experience for their clients. The COVID-19 pandemic struck almost every country across the
                            globe.</p>
                        <h5 class="text-light fw-bold">What&apos;s next for Deriv?</h5>
                        <p>We&apos;ve always been about innovation, right from the beginning. The future is hard to predict,
                            but
                            you always need to build for the future. We&apos;ve been in the industry for over 20 years, and
                            we&apos;ve
                            remained committed and consistent when it comes to evolving to reflect the current times and
                            market trends to provide the best service for our clients. The future is full of opportunities,
                            and I believe it&apos;s important to explore what&apos;s out there and start now.</p>
                    </div>
                </div>
                <div class="col-lg-4">
                    <img src="{{ asset('images/ceo.png') }}" alt="dtx_ceo" class="img-fluid">
                </div>
            </div>
        </section>
    </div>
@endsection

@section('scripts')
    <script src="{{ asset('plugins/swiper-bundle.min.js') }}"></script>
    <!-- Initialize Swiper -->
    <script>
        var swiper = new Swiper(".mySwiper", {
            pagination: {
                el: ".swiper-pagination",
                clickable: true,
                renderBullet: function(index, className) {
                    return '<span class="' + className + '">' + "</span>";
                },
            },
            // Responsive breakpoints
            breakpoints: {
                // when window width is >= 990px
                990: {
                    slidesPerView: 3,
                    spaceBetween: 30,
                }
            },
        });
    </script>
@endsection
