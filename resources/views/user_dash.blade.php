@extends('layouts.user_layout')

@section('content')
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
        <div class="container">
            <h2 class="main-title">Dashboard</h2>
            <div class="row stat-cards">
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon primary">
                            <i data-feather="bar-chart-2" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">$
                                @foreach ($userPayments as $userPayment)
                                    @if ($userPayment->paymentAdd->symbole == 'BTC')
                                        @if ($userPayment->status == 1)
                                            @php
                                                $btcSum += (float)$userPayment->amount
                                            @endphp
                                        @endif
                                        
                                    @endif
                                @endforeach
                                {{ $btcSum }}
                            </p>
                            <p class="stat-cards-info__title">Bitcoin</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit success">
                                    <i data-feather="trending-up" aria-hidden="true"></i>4.07%
                                </span>
                                Last month
                                
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon warning">
                            <i data-feather="file" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">$
                                @foreach ($userPayments as $userPayment)
                                    @if ($userPayment->paymentAdd->symbole == 'ETH')
                                        @if ($userPayment->status == 1)
                                            @php
                                                $ethSum += (float)$userPayment->amount
                                            @endphp
                                        @endif
                                        
                                    @endif
                                @endforeach
                                {{ $ethSum }}
                            </p>
                            <p class="stat-cards-info__title">Etherum</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit success">
                                    <i data-feather="trending-up" aria-hidden="true"></i>0.24%
                                </span>
                                Last month
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon purple">
                            <i data-feather="file" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">$
                                @foreach ($userPayments as $userPayment)
                                    @if ($userPayment->paymentAdd->symbole == 'USDT')
                                        @if ($userPayment->status == 1)
                                            @php
                                                $usdtSum += (float)$userPayment->amount
                                            @endphp
                                        @endif
                                    @endif
                                @endforeach
                                {{ $usdtSum }}
                            </p>
                            <p class="stat-cards-info__title">USDT</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit danger">
                                    <i data-feather="trending-down" aria-hidden="true"></i>1.64%
                                </span>
                                Last month
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon success">
                            <i data-feather="feather" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">$
                                @foreach ($userPayments as $userPayment)
                                    @if ($userPayment->paymentAdd->symbole == 'TRX')
                                        @if ($userPayment->status == 1)
                                            @php
                                                $trxSum += (float)$userPayment->amount
                                            @endphp
                                        @endif
                                        
                                    @endif
                                @endforeach
                                {{ $trxSum }}
                            </p>
                            <p class="stat-cards-info__title">Tron</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit warning">
                                    <i data-feather="trending-up" aria-hidden="true"></i>0.00%
                                </span>
                                Last month
                            </p>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="users-table table-wrapper">
                        <table class="posts-table">
                            <thead>
                                <tr class="users-table-info">
                                    <th>S/N</th>
                                    <th>Plan Name</th>
                                    <th>Min deposite</th>
                                    <th>Max deposite</th>
									<th>Bonus</th>
									<th>Payment period</th>
                                    <th>Date Added</th>
									<th>Date Updated</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($plans->count() > 0)
                                    
                                    @foreach ($plans as $plan)
                                            
                                        <tr>
                                            <td>
                                                {{$i++}}
                                            </td>
                                            <td>
                                                {{$plan->plan_name}}
                                            </td>
                                            <td>
                                                ${{$plan->min_deposite}}
                                            </td>
											<td>
                                                ${{$plan->max_deposite}}
                                            </td>
											<td>
                                                {{$plan->bonus}}
                                            </td>
                                            <td>{{$plan->payment_period}}</td>
                                            <td>{{$plan->created_at->toDayDateTimeString()}}</td>
											<td>{{$plan->updated_at->toDayDateTimeString()}}</td>
                            
                                        </tr>
                                            
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="7"><span>No payment plan yet</span></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
            
                    </div>
                </div>

                <div class="col-lg-3">
                    <article class="white-block">
                        <div class="top-cat-title">
                            <h3>Top categories</h3>
                            <p>28 Categories, 1400 Posts</p>
                        </div>
                        <ul class="top-cat-list">
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Lifestyle <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Dailiy lifestyle articles <span class="purple">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Tutorials <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Coding tutorials <span class="blue">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Technology <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Dailiy technology articles <span class="danger">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        UX design <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        UX design tips <span class="success">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Interaction tips <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Interaction articles <span class="warning">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        App development <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Mobile development articles <span class="warning">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Nature <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Wildlife animal articles <span class="warning">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Geography <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Geography articles <span class="primary">+472</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </article>
                </div>
            </div>
        </div>
    </main>
@endsection
