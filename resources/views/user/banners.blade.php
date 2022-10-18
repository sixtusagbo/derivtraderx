@extends('layouts.user_layout')

@section('content')
    <h3 class="main-title">Referral program</h3>

    <div class="card white-block p-2 d-flex justify-content-center align-items-center">
        <img src="{{ asset('images/banner_468x60.png') }}" alt="468x60" class="img-fluid m-3">
        <img src="{{ asset('images/banner_728x90.png') }}" alt="728x90" class="img-fluid m-3">
        <img src="{{ asset('images/banner_1200x150.png') }}" alt="1200x150" class="img-fluid m-3">
        <img src="{{ asset('images/banner_1920x200.png') }}" alt="1920x200" class="img-fluid m-3">
    </div>
@endsection
