@extends('layouts.auth')

@section('content')
    <h1 class="sign-up__title fw-bold">Verify Your Email Address</h1>
    <p class="sign-up__subtitle">Before proceeding, please check your email for a verification link. <br>If you did not
        receive the email</p>
    @if (session('resent'))
        <div class="alert alert-success" role="alert">
            {{ __('A fresh verification link has been sent to your email address.') }}
        </div>
    @endif

    <form class="sign-up-form form" method="POST" action="{{ route('verification.resend') }}">
        @csrf

        <button class="form-btn primary-default-btn transparent-btn">Click here to request another</button>
    </form>
@endsection
