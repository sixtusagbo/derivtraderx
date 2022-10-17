@extends('layouts.user_layout')

@section('content')
    <main class="main">
        <div class="container">
            @forelse ($plans as $plan)
                <div class="white-block card p-0">
                    <div class="card-header p-4 pb-2">
                        <h5 class="card-title text-uppercase">{{ $plan->name }} PLAN</h5>
                    </div>
                    <div class="card-body p-0">
                        <div class="mi-table table-wrapper">
                            <table class="posts-table">
                                <thead>
                                    <tr class="mi-table-info">
                                        <th class="ps-4">DEPOSIT AMOUNT</th>
                                        <th>PAYMENT CHANNEL</th>
                                        <th>STATUS</th>
                                        <th>DATE</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($currentUserPayments as $payment)
                                        @if ($payment->plans->id == $plan->id)
                                            <tr>
                                                <td>
                                                    ${{ number_format($payment->amount, 2) }}
                                                </td>
                                                <td>{{ $payment->paymentAdd->name }} ({{ $payment->paymentAdd->network }})
                                                </td>
                                                <td>
                                                    @switch($payment->status)
                                                        @case(0)
                                                            <span class="badge-pending">Pending</span>
                                                        @break

                                                        @case(1)
                                                            <span class="badge-success">Approved</span>
                                                        @break

                                                        @default
                                                    @endswitch
                                                </td>
                                                <td>{{ $payment->created_at->toDayDateTimeString() }}</td>
                                            </tr>
                                        @else
                                            <tr>
                                                <td colspan="4" class="border-0">
                                                    <div class="badge rounded-pill bg-light-danger text-light-danger"
                                                        style="font-size: .8rem">No deposits for this
                                                        plan</div>
                                                </td>
                                            </tr>
                                        @endif
                                        @empty
                                        @endforelse
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    @empty
                        <div class="text-info">No plans yet, contact <a class="link-warning"
                                href="support@derivtraderx.com">support</a>.</div>
                    @endforelse
                </div>
            </main>
        @endsection
