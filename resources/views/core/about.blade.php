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
                Primetraderx is an international financial organization. Prime
                Group's operational headquarters is located in Cyberjaya and is home to a majority of teams such as Back-end
                and Front-end, IT Operations, Customer Support, Compliance, Marketing, Trading, Business Intelligence, and
                Human Resources, to name a few.
            </p>

            <p class="mb-5">
                Primetraderx works with a team of experts in cryptocurrency trading, arbitrage and trade in the forex
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
