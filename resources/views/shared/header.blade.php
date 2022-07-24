<div class="container-fluid header px-5">
    <header class="d-flex flex-wrap justify-content-center py-4 px-5" data-aos="zoom-out" data-aos-delay="800">
        <a href="{{ url('/') }}"
            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img src="{{ asset('images/logo.png') }}" alt="" width="35px">
            <span class="fs-4 text-light ms-2 fw-bold">Deriv Traderx</span>
        </a>

        <ul class="nav nav-pills">
            <li class="nav-item"><a href="{{ url('/') }}" class="nav-link text-light" aria-current="page">Home</a>
            </li>
            <li class="nav-item"><a href="" class="nav-link text-light">About Us</a></li>
            <li class="nav-item"><a href="" class="nav-link text-light">FAQ</a></li>
            <li class="nav-item"><a href="" class="nav-link text-light">Contacts</a></li>
            <li class="nav-item"><a href="" class="nav-link text-light">Login</a></li>
            <a href="{{ route('register') }}" class="btn ml-lg-auto dark-button">Register</a>
        </ul>

    </header>
</div>
