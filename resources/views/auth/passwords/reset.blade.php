@extends('layouts.auth')

@section('content')
    <h1 class="sign-up__title fw-bold">Reset password</h1>
    <p class="sign-up__subtitle">Please fill this form correctly in order to modify the password attached to your account.
    </p>
    <form class="sign-up-form form" method="POST" action="{{ route('password.update') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $token }}">

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

        <button class="form-btn primary-default-btn transparent-btn">Reset Password</button>
    </form>
@endsection
