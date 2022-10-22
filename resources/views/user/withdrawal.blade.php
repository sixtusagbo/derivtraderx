@extends('layouts.user_layout')

@section('content')
    <div class="withdrawals">

        <div class="row">
            <div class="col-lg-4 col-md-6 col-12">
                <div class="row">
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="card white-block text-center">
                            <div class="card-body d-flex justify-content-center align-items-center flex-column">
                                <div class="avatar">
                                    <i data-feather="eye" aria-hidden="true"></i>
                                </div>

                                <h3 class="fw-bolder mb-3">{{ '$' . number_format($userNetWorth, 2) }}</h3>

                                <p class="card-text">Account Balance</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-6 col-12">
                        <div class="card white-block text-center">
                            <div class="card-body d-flex justify-content-center align-items-center flex-column">
                                <div class="p-2 mb-3">
                                    <div class="spinner-grow text-info" role="status">
                                        <span class="visually-hidden">Loading...</span>
                                    </div>
                                </div>

                                <h3 class="fw-bolder mb-3">{{ '$' . number_format($pendingWithdrawals, 2) }}</h3>

                                <p class="card-text">Pending withdrawals</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card white-block text-center pb-1">
                            <div class="card-header bg-transparent border-0 d-flex justify-content-between">
                                <p>Withdrawable</p>
                                @if ($referralEarnings < $tangibleReferralVolume)
                                    <p>{{ '$' . number_format($planEarnings, 2) }}</p>
                                @else
                                    <p>{{ '$' . number_format($allEarnings, 2) }}</p>
                                @endif
                            </div>
                            <div class="card-body">
                                @if ($planEarnings <= 0)
                                    <h4 class="card-title">You can make profit by</h4>
                                    <a href="{{ route('deposit') }}" class="btn btn-outline-primary text-light"
                                        style="outline: none;">investing</a>
                                @else
                                    <a class="btn btn-info" data-bs-toggle="modal" role="button"
                                        href="#create-withdrawal-modal">
                                        Withdraw
                                    </a>
                                @endif
                            </div>
                        </div>
                    </div>
                </div>

            </div>
            <div class="col-lg-8 col-md-6 col-12">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card white-block p-0">
                            <div class="card-header border-0 bg-transparent mb-3 p-4">
                                <h5 class="card-title mb-3">Available Payment Methods</h5>
                                <p>Minimum withdrawal amount is ${{ $tangibleReferralVolume }} for referral
                                    earnings. For
                                    Dogecoin, Dash, BNB, Tronx and other altcoins are $10. For Bitcoin and Ethereum are $30
                                    due to
                                    high fee costs. All Payments are Instant.</p>
                            </div>

                            <div class="card-body p-0 m-0">
                                <div class="table-responsive">
                                    <table class="table table-hover table-secondary">
                                        <thead>

                                            <tr>
                                                <th></th>
                                                <th>Processing</th>
                                                <th>Available</th>
                                                <th>Pending</th>
                                                <th>Account</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <img src="{{ asset('images/btc.png') }}" width="32" height="32">
                                                    BITCOIN
                                                </td>
                                                <td>
                                                    <b class="badge rounded-pill bg-light-success text-light-success me-1">
                                                        {{ '$' . number_format($btcPayments->where('status', 1)->sum->amount, 2) }}
                                                    </b>
                                                </td>
                                                <td>
                                                    <b class="badge rounded-pill bg-light-warning text-light-warning me-1">
                                                        {{ '$' . number_format($btcPayments->where('status', 0)->sum->amount, 2) }}
                                                    </b>
                                                </td>
                                                <td>
                                                    @if ($withdrawalAddresses->contains('symbol', 'BTC'))
                                                        <a class="badge rounded-pill bg-success p-1" data-bs-toggle="modal"
                                                            role="button" href="#set-btc-address-modal">
                                                            <i data-feather="check" aria-hidden="true"></i>
                                                        </a>
                                                    @else
                                                        <a class="badge rounded-pill bg-light-secondary me-1"
                                                            data-bs-toggle="modal" role="button"
                                                            href="#set-btc-address-modal">
                                                            <i>not set</i>
                                                        </a>
                                                        <div class="spinner-border spinner-border-sm text-danger"
                                                            role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <img src="{{ asset('images/eth.png') }}" width="32" height="32">
                                                    ETHEREUM
                                                </td>
                                                <td>
                                                    <b class="badge rounded-pill bg-light-success text-light-success me-1">
                                                        {{ '$' . number_format($ethPayments->where('status', 1)->sum->amount, 2) }}
                                                    </b>
                                                </td>
                                                <td>
                                                    <b class="badge rounded-pill bg-light-warning text-light-warning me-1">
                                                        {{ '$' . number_format($ethPayments->where('status', 0)->sum->amount, 2) }}
                                                    </b>
                                                </td>
                                                <td>
                                                    @if ($withdrawalAddresses->contains('symbol', 'ETH'))
                                                        <a class="badge rounded-pill bg-success p-1" data-bs-toggle="modal"
                                                            role="button" href="#set-eth-address-modal">
                                                            <i data-feather="check" aria-hidden="true"></i>
                                                        </a>
                                                    @else
                                                        <a class="badge rounded-pill bg-light-secondary me-1"
                                                            data-bs-toggle="modal" role="button"
                                                            href="#set-eth-address-modal">
                                                            <i>not set</i>
                                                        </a>
                                                        <div class="spinner-border spinner-border-sm text-danger"
                                                            role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <img src="{{ asset('images/usdt.png') }}" width="32"
                                                        height="32">
                                                    USDT (BEP-20)
                                                </td>
                                                <td>
                                                    <b class="badge rounded-pill bg-light-success text-light-success me-1">
                                                        {{ '$' . number_format($usdtPayments->where('status', 1)->sum->amount, 2) }}
                                                    </b>
                                                </td>
                                                <td>
                                                    <b class="badge rounded-pill bg-light-warning text-light-warning me-1">
                                                        {{ '$' . number_format($usdtPayments->where('status', 0)->sum->amount, 2) }}
                                                    </b>
                                                </td>
                                                <td>
                                                    @if ($withdrawalAddresses->contains('symbol', 'USDT'))
                                                        <a class="badge rounded-pill bg-success p-1" data-bs-toggle="modal"
                                                            role="button" href="#set-usdt-address-modal">
                                                            <i data-feather="check" aria-hidden="true"></i>
                                                        </a>
                                                    @else
                                                        <a class="badge rounded-pill bg-light-secondary me-1"
                                                            data-bs-toggle="modal" role="button"
                                                            href="#set-usdt-address-modal">
                                                            <i>not set</i>
                                                        </a>
                                                        <div class="spinner-border spinner-border-sm text-danger"
                                                            role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td>
                                                    <img src="{{ asset('images/trx.png') }}" width="32" height="32">
                                                    TRON
                                                </td>
                                                <td>
                                                    <b class="badge rounded-pill bg-light-success text-light-success me-1">
                                                        {{ '$' . number_format($trxPayments->where('status', 1)->sum->amount, 2) }}
                                                    </b>
                                                </td>
                                                <td>
                                                    <b class="badge rounded-pill bg-light-warning text-light-warning me-1">
                                                        {{ '$' . number_format($trxPayments->where('status', 0)->sum->amount, 2) }}
                                                    </b>
                                                </td>
                                                <td>
                                                    @if ($withdrawalAddresses->contains('symbol', 'TRX'))
                                                        <a class="badge rounded-pill bg-success p-1"
                                                            data-bs-toggle="modal" role="button"
                                                            href="#set-trx-address-modal">
                                                            <i data-feather="check" aria-hidden="true"></i>
                                                        </a>
                                                    @else
                                                        <a class="badge rounded-pill bg-light-secondary me-1"
                                                            data-bs-toggle="modal" role="button"
                                                            href="#set-trx-address-modal">
                                                            <i>not set</i>
                                                        </a>
                                                        <div class="spinner-border spinner-border-sm text-danger"
                                                            role="status">
                                                            <span class="visually-hidden">Loading...</span>
                                                        </div>
                                                    @endif
                                                </td>
                                            </tr>
                                        </tbody>

                                        <!------------------ Set BTC Addresses Modal --------------------------------->
                                        <div class="modal fade" id="set-btc-address-modal" tabindex="-1"
                                            aria-labelledby="setBtcAddressModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content white-block">
                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-between mb-3 pb-1">
                                                            <h5 class="modal-title text-primary fw-bold"
                                                                id="setBtcAddressModalLabel">
                                                                Update your bitcoin address</h5>
                                                            <button type="button" class="btn-close bg-light"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        {!! Form::open(['route' => 'user_addresses']) !!}
                                                        {!! Form::hidden('symbol', 'BTC') !!}
                                                        {!! Form::hidden('name', 'Bitcoin') !!}
                                                        {!! Form::hidden('network', 'BTC') !!}
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <label for="address" class="form-label">Bitcoin</label>
                                                                <input type="text" name="address" class="form-control"
                                                                    id="address" aria-label="address"
                                                                    @if ($withdrawalAddresses->contains('symbol', 'BTC')) value="{{ $withdrawalAddresses->where('symbol', 'BTC')->first()->address }}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-end mt-3 pt-3">
                                                            <button type="button" class="btn btn-secondary me-3"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!------------------ Set ETH Addresses Modal --------------------------------->
                                        <div class="modal fade" id="set-eth-address-modal" tabindex="-1"
                                            aria-labelledby="setEthAddressModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content white-block">
                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-between mb-3 pb-1">
                                                            <h5 class="modal-title text-primary fw-bold"
                                                                id="setEthAddressModalLabel">
                                                                Update your ethereum address</h5>
                                                            <button type="button" class="btn-close bg-light"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        {!! Form::open(['route' => 'user_addresses']) !!}
                                                        {!! Form::hidden('symbol', 'ETH') !!}
                                                        {!! Form::hidden('name', 'Ethereum') !!}
                                                        {!! Form::hidden('network', 'ETH') !!}
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <label for="eth" class="form-label">Ethereum</label>
                                                                <input type="text" name="address" class="form-control"
                                                                    id="eth" aria-label="eth"
                                                                    @if ($withdrawalAddresses->contains('symbol', 'ETH')) value="{{ $withdrawalAddresses->where('symbol', 'ETH')->first()->address }}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-end mt-3 pt-3">
                                                            <button type="button" class="btn btn-secondary me-3"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!------------------ Set USDT Addresses Modal --------------------------------->
                                        <div class="modal fade" id="set-usdt-address-modal" tabindex="-1"
                                            aria-labelledby="setUsdtAddressModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content white-block">
                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-between mb-3 pb-1">
                                                            <h5 class="modal-title text-primary fw-bold"
                                                                id="setUsdtAddressModalLabel">
                                                                Update your usdt address</h5>
                                                            <button type="button" class="btn-close bg-light"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        {!! Form::open(['route' => 'user_addresses']) !!}
                                                        {!! Form::hidden('symbol', 'USDT') !!}
                                                        {!! Form::hidden('name', 'Tether USD') !!}
                                                        {!! Form::hidden('network', 'BEP-20') !!}
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <label for="usdt" class="form-label">USDT
                                                                    (BEP-20)</label>
                                                                <input type="text" name="address" class="form-control"
                                                                    id="usdt" aria-label="usdt"
                                                                    @if ($withdrawalAddresses->contains('symbol', 'USDT')) value="{{ $withdrawalAddresses->where('symbol', 'USDT')->first()->address }}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-end mt-3 pt-3">
                                                            <button type="button" class="btn btn-secondary me-3"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <!------------------ Set TRX Addresses Modal --------------------------------->
                                        <div class="modal fade" id="set-trx-address-modal" tabindex="-1"
                                            aria-labelledby="setTrxAddressModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content white-block">
                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-between mb-3 pb-1">
                                                            <h5 class="modal-title text-primary fw-bold"
                                                                id="setTrxAddressModalLabel">
                                                                Update your tronx address</h5>
                                                            <button type="button" class="btn-close bg-light"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        {!! Form::open(['route' => 'user_addresses']) !!}
                                                        {!! Form::hidden('symbol', 'TRX') !!}
                                                        {!! Form::hidden('name', 'Tronx') !!}
                                                        {!! Form::hidden('network', 'TRC-20') !!}
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <label for="trx" class="form-label">TRONX
                                                                    (TRC-20)</label>
                                                                <input type="text" name="address" class="form-control"
                                                                    id="trx" aria-label="trx"
                                                                    @if ($withdrawalAddresses->contains('symbol', 'TRX')) value="{{ $withdrawalAddresses->where('symbol', 'TRX')->first()->address }}" @endif>
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-end mt-3 pt-3">
                                                            <button type="button" class="btn btn-secondary me-3"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-success">Save</button>
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </table>
                                </div>
                            </div>

                            <!------------------ Create withdrawal request modal --------------------------------->
                            <div class="modal fade" id="create-withdrawal-modal" tabindex="-1"
                                aria-labelledby="createWithdrawalModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content white-block">
                                        <div class="modal-body">
                                            <div class="d-flex justify-content-between mb-3 pb-1">
                                                <h5 class="modal-title text-primary fw-bold"
                                                    id="createWithdrawalModalLabel">Make withdrawal request</h5>
                                                <button type="button" class="btn-close bg-light" data-bs-dismiss="modal"
                                                    aria-label="Close"></button>
                                            </div>
                                            {!! Form::open(['route' => 'withdrawals.store']) !!}
                                            <div class="row g-3">
                                                <div class="col-12">
                                                    <label class="form-label">Withdrawal Address</label>
                                                    {{ Form::select('withdrawal_add_id', $pluckedWithdrawalAddresses, null, ['class' => 'form-control text-light', 'required' => '', 'placeholder' => 'select withdrawal address']) }}
                                                </div>
                                                <div class="col-12">
                                                    <label for="amount" class="form-label">Enter
                                                        amount</label>
                                                    <input type="number" name="amount" required
                                                        @if ($referralEarnings < $tangibleReferralVolume) {{ 'max=' . $planEarnings }} @else {{ 'max=' . $allEarnings }} @endif
                                                        class="form-control">
                                                </div>
                                            </div>
                                            <div class="d-flex justify-content-end mt-3 pt-3">
                                                <button type="button" class="btn btn-secondary me-3"
                                                    data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-success">Save</button>
                                            </div>
                                            {!! Form::close() !!}
                                        </div>
                                    </div>
                                </div>
                            </div>

                            @if ($referralEarnings < $tangibleReferralVolume)
                                @if ($planEarnings < 0)
                                    <p class="p-3 text-info">You have no funds to withdraw</p>
                                @endif
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card white-block p-0">
                    <div class="card-header border-0 bg-transparent p-3 pb-0">
                        <h5 class="card-title mb-3">Withdrawals</h5>
                    </div>

                    <div class="card-body p-0 m-0">
                        <div class="table-responsive">
                            <table class="table table-hover table-secondary">
                                <thead>

                                    <tr>
                                        <th></th>
                                        <th>Channel</th>
                                        <th>Amount</th>
                                        <th>Status</th>
                                        <th>Date</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($withdrawals as $withdrawal)
                                        <tr>
                                            <td></td>
                                            <td>
                                                {{ $withdrawal->withdrawalAdd->symbol }}
                                            </td>
                                            <td>
                                                {{ '$' . number_format($withdrawal->amount, 2) }}
                                            </td>
                                            <td>
                                                @switch($withdrawal->status)
                                                    @case(0)
                                                        <span class="badge-pending">Pending</span>
                                                    @break

                                                    @case(1)
                                                        <span class="badge-success">Approved</span>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                            <td>{{ $withdrawal->created_at->toFormattedDateString() }}</td>
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

        </div>
    @endsection
