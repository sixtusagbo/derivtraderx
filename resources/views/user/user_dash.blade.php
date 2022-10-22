@extends('layouts.user_layout')

@section('content')
    <div class="row p-3 mb-3 welcome" style="margin-right: 0px;margin-left: 0px;">
        <div class="col-lg-2 d-flex justify-content-end align-items-end order-1">
            <div class="rounded-circle bg-primary d-flex justify-content-center align-items-center"
                style="height: 70px; width: 70px;">
                <i data-feather="award" aria-hidden="true"></i>
            </div>
        </div>
        <div class="col-lg-10 text-light">
            <h4> Welcome {{ Auth::user()->username }}, </h4>
            <p class="lead fst-italics fs-6 mt-2">We&apos;re happy to have you here!</p>
        </div>
    </div>

    <div class="row stat-cards">
        <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
                <div class="stat-cards-icon primary">
                    <img src="{{ asset('images/btc.png') }}" alt="">
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">
                        {{ "$" . number_format($btcSum, 2) }}
                    </p>
                    <p class="stat-cards-info__title">Bitcoin</p>
                </div>
            </article>
        </div>
        <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
                <div class="stat-cards-icon bg-light">
                    <img src="{{ asset('images/eth.png') }}" alt="" height="32px" width="32px">
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">
                        {{ "$" . number_format($ethSum, 2) }}
                    </p>
                    <p class="stat-cards-info__title">Etherum</p>
                </div>
            </article>
        </div>
        <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
                <div class="stat-cards-icon purple">
                    <img src="{{ asset('images/usdt.png') }}" alt="" height="42px" width="42px">
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">
                        {{ "$" . number_format($usdtSum, 2) }}
                    </p>
                    <p class="stat-cards-info__title">USDT</p>
                </div>
            </article>
        </div>
        <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
                <div class="stat-cards-icon success">
                    <img src="{{ asset('images/trx.png') }}" alt="" height="32px" width="32px">
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">
                        {{ "$" . number_format($trxSum, 2) }}
                    </p>
                    <p class="stat-cards-info__title">Tron</p>
                </div>
            </article>
        </div>
    </div>

    <div class="row" style="margin-right: -10px;margin-left: -10px;">
        <div class="col-lg-4 col-md-6 col-12">
            <article class="white-block">
                <div class="d-flex justify-content-between">
                    <div class="top-cat-title">
                        <h3>User Statistics</h3>
                    </div>
                    <i data-feather="more-vertical"></i>
                </div>

                <div class="overview">
                    <div class="overview-leading">
                        <div class="overview-leading-icon-wrapper bg-purple text-primary">
                            <i data-feather="calendar"></i>
                        </div>

                        <p class="overview-leading-title">Joined on</p>
                    </div>

                    <p class="overview-item">{{ Auth::user()->created_at->toFormattedDateString() }}</p>
                </div>
                <div class="overview">
                    <div class="overview-leading">
                        <div class="overview-leading-icon-wrapper bg-light-success text-light-success">
                            <i data-feather="log-in"></i>
                        </div>

                        <p class="overview-leading-title">Last login</p>
                    </div>

                    <p class="overview-item">
                        {{ Carbon\Carbon::create(Auth::user()->last_login)->toDayDateTimeString() }}</p>
                </div>
                <div class="overview">
                    <div class="overview-leading">
                        <div class="overview-leading-icon-wrapper bg-light-warning text-light-warning">
                            <i data-feather="crosshair"></i>
                        </div>

                        <p class="overview-leading-title">Your IP</p>
                    </div>

                    <p class="overview-item">{{ Auth::user()->last_login_ip }}</p>
                </div>
                <div class="overview">
                    <div class="overview-leading">
                        <div class="overview-leading-icon-wrapper bg-light-info text-light-info">
                            <i data-feather="crosshair"></i>
                        </div>

                        <p class="overview-leading-title">Last IP</p>
                    </div>

                    <p class="overview-item">{{ Auth::user()->last_login_ip }}</p>
                </div>
                <div class="overview">
                    <div class="overview-leading">
                        <div class="overview-leading-icon-wrapper bg-light-secondary text-light">
                            <i data-feather="mail"></i>
                        </div>

                        <p class="overview-leading-title">Email</p>
                    </div>

                    <p class="overview-item">{{ Auth::user()->email }}</p>
                </div>

            </article>
        </div>

        <div class="col-lg-4 col-md-6 col-12">
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
                        <span class="badge bg-purple text-primary mb-4">{{ __('on') }}</span>
                        <hr>
                        <div class="d-flex justify-content-between align-items-center">
                            <div class="d-flex flex-column">
                                <h6 class="text-light-secondary fw-bold mt-3 mb-2">Total Deposit</h6>
                                <h4 class="text-light">{{ '$' . number_format($totalDeposits, 2) }}</h4>
                            </div>
                            <div class="d-flex flex-column">
                                <h6 class="text-light-secondary fw-bold mt-3 mb-2">Earning</h6>
                                <h4 class="text-light">{{ '$' . number_format($allEarnings, 2) }}</h4>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>

        <div class="col-lg-4 col-md-6 col-12">
            <article class="white-block">
                <div class="d-flex justify-content-between">
                    <div class="top-cat-title">
                        <h3>Transactions</h3>
                    </div>
                    <i data-feather="more-vertical"></i>
                </div>

                <div class="overview">
                    <div class="overview-leading">
                        <div class="overview-leading-icon-wrapper bg-light-success text-light-success">
                            <i data-feather="trending-up"></i>
                        </div>

                        <p class="overview-leading-title">Last Deposit</p>
                    </div>

                    <p class="overview-item text-light-success">
                        @if ($userPayments->count() > 0)
                            {{ '$' . $userPayments->last()->amount }}
                        @else
                            {{ '$n/a' }}
                        @endif
                    </p>
                </div>
                <div class="overview">
                    <div class="overview-leading">
                        <div class="overview-leading-icon-wrapper bg-light-danger text-light-danger">
                            <i data-feather="trending-up"></i>
                        </div>

                        <p class="overview-leading-title">Last Withdrawal</p>
                    </div>

                    <p class="overview-item text-light-danger">
                        @if ($userWithdrawals->count() > 0)
                            {{ '$' . $userWithdrawals->last()->amount }}
                        @else
                            {{ '$n/a' }}
                        @endif
                    </p>
                </div>
                <div class="overview">
                    <div class="overview-leading">
                        <div class="overview-leading-icon-wrapper bg-light-info text-light-info">
                            <i data-feather="activity"></i>
                        </div>

                        <div class="d-flex flex-column">
                            <p class="overview-leading-title mb-2">Balance</p>
                            <small>Totals</small>
                        </div>
                    </div>

                    <p class="overview-item text-light-info"> {{ '$' . number_format($userNetWorth, 2) }} </p>
                </div>
                <div class="overview">
                    <div class="overview-leading">
                        <div class="overview-leading-icon-wrapper bg-light-warning text-light-warning">
                            <i data-feather="refresh-ccw"></i>
                        </div>

                        <div class="d-flex flex-column">
                            <p class="overview-leading-title">Withdraw</p>
                            <small>Payment</small>
                        </div>
                    </div>

                    <p class="overview-item text-light-warning">
                        {{ '$' . number_format($userWithdrawals->sum->amount, 2) }} </p>
                </div>
                <div class="overview">
                    <div class="overview-leading">
                        <div class="overview-leading-icon-wrapper bg-light-warning text-light-warning">
                            <i data-feather="bar-chart-2"></i>
                        </div>

                        <div class="d-flex flex-column">
                            <p class="overview-leading-title">Deposited</p>
                            <small>Funds</small>
                        </div>
                    </div>

                    <p class="overview-item text-light-warning"> {{ '$' . number_format($totalDeposits, 2) }} </p>
                </div>
            </article>
        </div>
    </div>

    <div class="row">
        <!-- Last Deposit Card-->
        <div class="col-lg-6 col-12">
            <div class="card white-block text-light border-none p-0">
                <div class="card-body p-0 m-0">
                    <div class="card-header border-0 bg-transparent p-3">
                        <h4 class="card-title">Last Deposits</h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-secondary">
                            <thead>
                                <tr>
                                    <th>Channel</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($userPayments->take(5) as $payment)
                                    <tr>
                                        <td class="text-uppercase">
                                            {{ $payment->paymentAdd->name }} ({{ $payment->paymentAdd->network }})
                                        </td>
                                        <td>
                                            {{ $payment->created_at->toDayDateTimeString() }}
                                        </td>
                                        <td>
                                            {{ '$' . number_format($payment->amount, 2) }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="border-0">
                                            <div class="badge rounded-pill bg-light-info text-light-info"
                                                style="font-size: .8rem">No deposits yet</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

        <!-- Last Withdrawal Card -->
        <div class="col-lg-6 col-12">
            <div class="card white-block text-light border-none p-0">
                <div class="card-body p-0 m-0">
                    <div class="card-header border-0 bg-transparent p-3">
                        <h4 class="card-title">Last Withdrawals</h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-secondary">
                            <thead>
                                <tr>
                                    <th>Channel</th>
                                    <th>Date</th>
                                    <th>Amount</th>
                                </tr>
                            </thead>
                            <tbody>

                                @forelse ($userWithdrawals->take(5) as $withdrawal)
                                    <tr>
                                        <td class="text-uppercase">
                                            {{ $withdrawal->paymentAdd->name }} ({{ $withdrawal->paymentAdd->network }})
                                        </td>
                                        <td>
                                            {{ $withdrawal->created_at->toDayDateTimeString() }}
                                        </td>
                                        <td>
                                            {{ '$' . number_format($withdrawal->amount, 2) }}
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="3" class="border-0">
                                            <div class="badge rounded-pill bg-light-info text-light-info"
                                                style="font-size: .8rem">No withdrawals yet</div>
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
