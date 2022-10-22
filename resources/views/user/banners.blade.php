@extends('layouts.user_layout')

@section('content')
    <h3 class="main-title">Referral Banner</h3>

    <div class="card white-block d-flex justify-content-center align-items-center">
        <a href="{{ asset('images/referral_banner.png') }}" class="btn btn-success text-light" download=""><i
                data-feather="download"></i>
            Download</a>

        <img src="{{ asset('images/referral_banner.png') }}" height="720px" width="640" class="img-fluid">
    </div>
@endsection
