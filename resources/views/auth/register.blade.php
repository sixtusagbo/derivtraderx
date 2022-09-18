@extends('layouts.auth')

@section('content')
    <h1 class="sign-up__title fw-bold">Get started</h1>
    <p class="sign-up__subtitle">You're just a few steps away from getting the best yielding investment
        account🚀</p>
    <form class="sign-up-form form" method="POST" action="{{ route('register') }}">
        @csrf

        <label class="form-label-wrapper">
            <p class="form-label">Full Name</p>
            <input class="form-input @error('name') is-invalid @enderror" type="text" name="name"
                placeholder="Enter your name in full" value="{{ old('name') }}" autocomplete="name" required>

            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </label>
        <label class="form-label-wrapper">
            <p class="form-label">Username</p>
            <input class="form-input @error('username') is-invalid @enderror" type="text" name="username"
                placeholder="Enter your user name" value="{{ old('username') }}" required>

            @error('username')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </label>
        <label class="form-label-wrapper">
            <p class="form-label">Email</p>
            <input class="form-input @error('email') is-invalid @enderror" type="email" name="email"
                placeholder="Enter your email" value="{{ old('email') }}" autocomplete="email" required>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </label>
        <label class="form-label-wrapper">
            <p class="form-label">Password</p>
            <input class="form-input @error('password') is-invalid @enderror" type="password"
                placeholder="Enter your password" name="password" autocomplete="new-password" required>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </label>
        <label class="form-label-wrapper">
            <p class="form-label">Confirm Password</p>
            <input class="form-input" type="password" placeholder="Retype password" name="password_confirmation"
                autocomplete="new-password" required>
        </label>
        <label class="form-checkbox-wrapper">
            <input class="form-checkbox" type="checkbox" required>
            <span class="form-checkbox-label">I accept <a href="{{ route('policy') }}"
                    class="link-primary text-decoration-none">Terms & conditions</a></span>
        </label>

        <button class="form-btn primary-default-btn transparent-btn">Sign in</button>
        <p class="mt-4 text-center text-light">Already have an account? <a href="{{ route('login') }}"
                class="link-primary text-decoration-none">Sign in instead</a></p>
    </form>
@endsection
