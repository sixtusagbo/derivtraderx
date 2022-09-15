@extends('layouts.auth')

@section('content')
    <h1 class="sign-up__title fw-bold">Reset Password</h1>
    <p class="sign-up__subtitle">Forgot your password, Sorry😥. Enter your email let's begin the recovery process.
    </p>
    <form class="sign-up-form form" method="POST" action="{{ route('password.email') }}">
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

        <button class="form-btn primary-default-btn transparent-btn">Send Password Reset Link</button>
    </form>
@endsection
