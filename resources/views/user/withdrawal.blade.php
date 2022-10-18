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

                                <h3 class="fw-bolder mb-3">$0.00</h3>

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

                                <h3 class="fw-bolder mb-3">$</h3>

                                <p class="card-text">Pending withdrawals</p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12">
                        <div class="card white-block text-center pb-1">
                            <div class="card-header bg-transparent border-0 text-start">Withdrawable account balance
                            </div>
                            <div class="card-body">
                                <h4 class="card-title">You can make a profit by investing</h4>
                                <a href="{{ route('deposit') }}" class="btn btn-outline-primary"
                                    style="outline: none;">Invest</a>
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
                                <p>Minimum withdrawal amounts for Perfect Money and EpayCore
                                    are $1. For
                                    Litecoin, Dogecoin, Dash and BNB are $10. For Bitcoin and Ethereum are $30 due to
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
                                                <td><img src="{{ asset('images/btc.png') }}" width="32" height="32">
                                                    BITCOIN</td>
                                                <td><b
                                                        class="badge rounded-pill bg-light-success text-light-success me-1">$0.00</b>
                                                </td>
                                                <td><b
                                                        class="badge rounded-pill bg-light-warning text-light-warning me-1">$0.00</b>
                                                </td>
                                                <td><a class="badge rounded-pill bg-light-secondary me-1"
                                                        data-bs-toggle="modal" role="button"
                                                        href="#set-addresses-modal"><i>not set</i></a>
                                                    <div class="spinner-border text-danger" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><img src="{{ asset('images/eth.png') }}" width="32" height="32">
                                                    ETHEREUM</td>
                                                <td><b
                                                        class="badge rounded-pill bg-light-success text-light-success me-1">$0.00</b>
                                                </td>
                                                <td><b
                                                        class="badge rounded-pill bg-light-warning text-light-warning me-1">$0.00</b>
                                                </td>
                                                <td><a class="badge rounded-pill bg-light-secondary me-1"
                                                        data-bs-toggle="modal" role="button"
                                                        href="#set-addresses-modal"><i>not set</i></a>
                                                    <div class="spinner-border text-danger" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><img src="{{ asset('images/usdt.png') }}" width="32" height="32">
                                                    USDT (BEP-20)</td>
                                                <td><b
                                                        class="badge rounded-pill bg-light-success text-light-success me-1">$0.00</b>
                                                </td>
                                                <td><b
                                                        class="badge rounded-pill bg-light-warning text-light-warning me-1">$0.00</b>
                                                </td>
                                                <td><a class="badge rounded-pill bg-light-secondary me-1"
                                                        data-bs-toggle="modal" role="button"
                                                        href="#set-addresses-modal"><i>not set</i></a>
                                                    <div class="spinner-border text-danger" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr>
                                                <td></td>
                                                <td><img src="{{ asset('images/trx.png') }}" width="32" height="32">
                                                    TRON</td>
                                                <td><b
                                                        class="badge rounded-pill bg-light-success text-light-success me-1">$0.00</b>
                                                </td>
                                                <td><b
                                                        class="badge rounded-pill bg-light-warning text-light-warning me-1">$0.00</b>
                                                </td>
                                                <td><a class="badge rounded-pill bg-light-secondary me-1"
                                                        data-bs-toggle="modal" role="button"
                                                        href="#set-addresses-modal"><i>not set</i></a>
                                                    <div class="spinner-border text-danger" role="status">
                                                        <span class="visually-hidden">Loading...</span>
                                                    </div>
                                                </td>
                                            </tr>
                                        </tbody>

                                        <!------------------ Set Addresses Modal --------------------------------->
                                        <div class="modal fade" id="set-addresses-modal" tabindex="-1"
                                            aria-labelledby="setAddressModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content white-block">
                                                    <div class="modal-body">
                                                        <div class="d-flex justify-content-between mb-3 pb-1">
                                                            <h5 class="modal-title text-primary fw-bold"
                                                                id="setAddressModalLabel">
                                                                Update your wallet addresses</h5>
                                                            <button type="button" class="btn-close bg-light"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <!-- Add product form -->
                                                        {!! Form::open(['route' => 'user_addresses']) !!}
                                                        <div class="row g-3">
                                                            <div class="col-12">
                                                                <label for="btc" class="form-label">Bitcoin</label>
                                                                <input type="text" name="btc" class="form-control"
                                                                    id="btc" aria-label="btc">
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="eth" class="form-label">Ethereum</label>
                                                                <input type="text" name="eth" class="form-control"
                                                                    id="eth" aria-label="eth">
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="usdt" class="form-label">USDT
                                                                    (BEP-20)</label>
                                                                <input type="text" name="usdt" class="form-control"
                                                                    id="usdt" aria-label="usdt">
                                                            </div>
                                                            <div class="col-12">
                                                                <label for="trx" class="form-label">TRONX</label>
                                                                <input type="text" name="trx" class="form-control"
                                                                    id="trx" aria-label="trx">
                                                            </div>
                                                        </div>
                                                        <div class="d-flex justify-content-end mt-3 pt-3">
                                                            <button type="button" class="btn btn-secondary me-3"
                                                                data-bs-dismiss="modal">Cancel</button>
                                                            <button type="submit" class="btn btn-primary">Save</button>
                                                        </div>
                                                        {!! Form::close() !!}
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </table>
                                </div>
                            </div>

                            <p class="p-3">You have no funds to withdraw.</p>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
