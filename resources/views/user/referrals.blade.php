@extends('layouts.user_layout')

@section('content')
    <h3 class="main-title">Referral program</h3>

    <div class="card white-block p-2">
        <div class="card-body">
            <!-- begin row -->
            <div class="row">
                <!-- begin col-7 -->
                <div class="col-xxl-8 col-xl-4 col-lg-8 col-md-6 col-sm-12 col-12 d-flex justify-content-center">
                    <article class="white-block p-0">
                        <div class="card mb-0 bg-transparent text-center">
                            <img src="{{ asset('images/user_cover_bg.jpg') }}" class="img-fluid card-img-top" alt="User Cover"
                                style="position: relative">
                            <div class="card-body">
                                <div class="user-image-wrapper">
                                    <div class="user-image">
                                        <div class="user-avatar">
                                            <img src="{{ asset('images/user_large.png') }}" alt="User Image">
                                        </div>
                                    </div>
                                </div>
                                <h5 class="card-title mb-3">{{ Auth::user()->username }}</h5>
                                <span class="badge bg-purple text-primary mb-4">{{ __('User') }}</span>
                                <hr>
                            </div>
                        </div>
                    </article>
                </div>
                <div class="col-xxl-4 col-xl-8 col-lg-4 col-md-6 col-sm-12 col-12">
                    <div class="row">
                        <div class="col-lg-4">
                            <h4>Your refferral link</h4>
                        </div>
                        <div class="form-group col-lg-6">
                            <input type="text" class="form-control is-valid text-light-success" id="refferalLink"
                                value="{{ Auth::user()->referral_link }}" readonly=""
                                style="border-color: #28c76f !important;">
                        </div>
                        <div class="form-group col-lg-1">
                            <button onclick="copyLink()" class="copy-btn">Copy!</button>
                        </div>
                    </div>

                    <div class="table-responsive">
                        <br>
                        <table class="table table-hover table-secondary">
                            <tbody>
                                <tr>
                                    <td class="item">Referrals:</td>
                                    <td class="item">{{ count(Auth::user()->referrals) }}</td>
                                </tr>
                                <tr>
                                    <td class="item">You referred:</td>
                                    <td class="item">
                                        @forelse (Auth::user()->referrals as $user)
                                            {{ __($user->username) }}
                                            @if ($user->id != Auth::user()->referrals->last()->id)
                                                {{ __(' | ') }}
                                            @endif
                                        @empty
                                            <p class="fst-italic">no one yet</p>
                                        @endforelse
                                    </td>
                                </tr>
                                <tr>
                                    <td class="item">Total referral commission:</td>
                                    <td class="item">
                                        {{ '$' . number_format(count(Auth::user()->referrals) * 3, 2) }}
                                    </td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>
            <!-- end row -->
        </div>
    </div>
@endsection

@section('script')
    <script>
        function copyLink() {
            /* Get the text field */
            var refInput = document.getElementById("refferalLink");

            /* Select the text field */
            refInput.select();

            /* Copy the link inside the text field */
            document.execCommand("copy");

            /* Alert the copied link */
            alert("Referral link copied");
        }
    </script>
@endsection
