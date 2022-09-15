@extends('layouts.auth')

@section('content')
    <h1 class="sign-up__title fw-bold">Welcome back!</h1>
    <p class="sign-up__subtitle">Sign in to your account and continue the adventure of making money from investment🚀
    </p>
    <form class="sign-up-form form" method="POST" action="{{ route('login') }}">
        @csrf

        <label class="form-label-wrapper">
            <p class="form-label">Email Address</p>
            <input class="form-input @error('email') is-invalid @enderror" type="email" placeholder="Enter your email"
                name="email" value="{{ old('email') }}" autocomplete="email" required>

            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </label>
        <label class="form-label-wrapper">
            <p class="form-label">Password</p>
            <input class="form-input @error('password') is-invalid @enderror" type="password"
                placeholder="Enter your password" name="password" autocomplete="current-password" required>

            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </label>

        @if (Route::has('password.request'))
            <a class="link-info forget-link text-primary"
                href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
        @endif
        <label class="form-checkbox-wrapper">
            <input class="form-checkbox" type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }} required>
            <span class="form-checkbox-label">Remember me next time</span>
        </label>

        <button class="form-btn primary-default-btn transparent-btn">Sign in</button>
        <p class="mt-4 text-center text-light">New to derivtraderx? <a href="{{ route('register') }}"
                class="link-primary text-decoration-none">Create an account</a></p>
    </form>
@endsection
