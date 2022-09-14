@extends('layouts.core')

@section('styles')
    <link rel="stylesheet" href="{{ asset('plugins/swiper-bundle.min.css') }}">
@endsection

@section('content')
    <div class="left-decked-title">
        <h4 class="text-primary mt-3">About</h4>
        <h1 class="text-light display-5 fw-bold">COMPANY</h1>
    </div>

    <div class="py-5">
        <p class="mb-5">
            Derivtraderx is an international financial organization that has been working since July 2018. Our company is
            located in Utrecht, Netherlands. As the derivtraderx team, we decided to receive investments in order to grow
            and sharing our profits with our investors.
        </p>

        <p class="mb-5">
            Derivtraderx works with a team of experts in cryptocurrency trading, arbitrage and trade in the forex market. We
            guarantee stable profits to our investors. The company has strong capital and the capital owned by our company
            is guaranteed for investors.
        </p>

        <p>
            You are able to earn money without making any risky decision. We have developed a system that guarantees
            constant passive income in 5 investment plans and these plans are at least 24hrs. After you making a deposit,
            you are able to earn by 10% to 50% passive income per plan duration till end of the term of your contracts.
        </p>
    </div>

    <section class="office-showcase py-3">
        <h3 class="text-light fs-2 mb-5 text-center office-showcase-title">Our <span class="text-primary">Office</span>
        </h3>

        <!-- Swiper -->
        <div class="swiper mySwiper">
            <div class="swiper-wrapper">
                <div class="swiper-slide"><img src="{{ asset('images/office-showcase/9.jpg') }}" alt="our-office-1"></div>
                <div class="swiper-slide"><img src="{{ asset('images/office-showcase/2.jpg') }}" alt="our-office-2"></div>
                <div class="swiper-slide"><img src="{{ asset('images/office-showcase/7.jpg') }}" alt="our-office-3"></div>
                <div class="swiper-slide"><img src="{{ asset('images/office-showcase/4.jpg') }}" alt="our-office-4"></div>
                <div class="swiper-slide"><img src="{{ asset('images/office-showcase/5.jpg') }}" alt="our-office-5"></div>
                <div class="swiper-slide"><img src="{{ asset('images/office-showcase/6.jpg') }}" alt="our-office-6"></div>
                <div class="swiper-slide"><img src="{{ asset('images/office-showcase/1.jpg') }}" alt="our-office-7"></div>
                <div class="swiper-slide"><img src="{{ asset('images/office-showcase/8.jpg') }}" alt="our-office-8"></div>
                <div class="swiper-slide"><img src="{{ asset('images/office-showcase/2.jpg') }}" alt="our-office-9"></div>
            </div>
            <div class="swiper-pagination"></div>
        </div>
    </section>

    <section class="about-ceo my-3">
        <div class="row">
            <div class="col-lg-8 text-center">
                <h3 class="text-light display-6 fw-bold">Our CEO</h3>

                <div class="my-3">
                    <p class="mb-3">Masako Kato was born in the Canadian province of Saskatchewan due to her family
                        immigration to Canada. Masako Kato, who settled in Toronto for university education, graduated from
                        the University of Toronto in the department of economics. She then completed master's degree in risk
                        management at New York University.
                        In 2011, she started working in the New York office of Franklin Templeton Company</p>
                    <p class="mb-3">After working here for 5 years, she started working as a manager in the Netherlands
                        office of Binance Company in 2016.</p>
                    <p>Deciding to establish her own company after 3 years, Masako gathered a professional team and founded
                        derivtraderx company in 2018. The company, which takes its name from the miners village of
                        Saskatchewan state where she was born, has been growing for 2 years. Masako Kato is the CEO and
                        chairman of the board.</p>
                </div>
            </div>
            <div class="col-lg-4">
                <img src="{{ asset('images/ceo.png') }}" alt="dtx_ceo" class="img-fluid">
            </div>
        </div>
    </section>
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
