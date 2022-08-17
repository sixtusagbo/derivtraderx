<div class="container-fluid header px-3">
    <header class="d-flex flex-wrap justify-content-between py-4" data-aos="zoom-out" data-aos-delay="800">
        <a href="{{ url('/') }}"
            class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
            <img src="{{ asset('images/logo.png') }}" alt="" width="35px">
            <span class="fs-4 text-light ms-2 fw-bold">Deriv Traderx</span>
        </a>

        <ul class="nav nav-pills d-none d-lg-flex">
            <li class="nav-item"><a href="{{ url('/') }}" class="nav-link text-light" aria-current="page">Home</a>
            </li>
            <li class="nav-item"><a href="{{ route('about') }}" class="nav-link text-light">About Us</a></li>
            <li class="nav-item"><a href="" class="nav-link text-light">FAQ</a></li>
            <li class="nav-item"><a href="" class="nav-link text-light">Contacts</a></li>
            <li class="nav-item"><a href="" class="nav-link text-light">Login</a></li>
            <a href="{{ route('register') }}" class="btn ml-lg-auto dark-button">Register</a>
        </ul>

        <a class="nav-link text-light d-lg-none" data-bs-toggle="offcanvas" href="#menuCanvas" role="button"
            aria-controls="menuCanvas">
            <span class="material-icons">menu</span>
        </a>

    </header>

    <div class="offcanvas offcanvas-end menu-canvas" tabindex="-1" id="menuCanvas" aria-labelledby="menuCanvasLabel">
        <div class="offcanvas-header">
            <h5 id="menuCanvasLabel" class="fw-bold text-dark">Menu</h5>
            <button type="button" class="btn-close text-reset" data-bs-dismiss="offcanvas" aria-label="Close">
            </button>
        </div>
        <div class="offcanvas-body">
            <ul class="nav d-flex flex-column fw-bold">
                <li class="nav-item"><a href="{{ url('/') }}" class="nav-link text-dark"
                        aria-current="page">Home</a></li>
                <li class="nav-item"><a href="{{ route('about') }}" class="nav-link text-dark">About Us</a></li>
                <li class="nav-item"><a href="" class="nav-link text-dark">FAQ</a></li>
                <li class="nav-item"><a href="" class="nav-link text-dark">Contacts</a></li>
                <li class="nav-item"><a href="{{ route('login') }}" class="nav-link text-dark">Login</a></li>
                <a href="{{ route('register') }}" class="btn ml-lg-auto dark-button">Register</a>
            </ul>
        </div>
    </div>
</div>
