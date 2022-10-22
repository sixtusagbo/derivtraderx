@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-9 col-xl-9">
            <h2 class="main-title">User Withdrawal Addresses</h2>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card white-block text-light border-none p-0">
                <div class="card-body p-0 m-0">

                    <div class="table-responsive">
                        <table class="table table-hover table-secondary">
                            <thead>
                                <tr>
                                    <th>S/N</th>
                                    <th>Coin Address</th>
                                    <th>Coin Name</th>
                                    <th>Symbol</th>
                                    <th>Network</th>
                                    <th>Added on</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($allwithdrawalAdds->count() > 0)
                                    @foreach ($allwithdrawalAdds as $allwithdrawalAdd)
                                        <tr>
                                            <td>
                                                {{ $i++ }}
                                            </td>
                                            <td>
                                                {{ $allwithdrawalAdd->address }}
                                            </td>
                                            <td>
                                                {{ $allwithdrawalAdd->name }}
                                            </td>
                                            <td>
                                                {{ $allwithdrawalAdd->symbol }}
                                            </td>
                                            <td>
                                                {{ $allwithdrawalAdd->network }}
                                            </td>
                                            <td>{{ $allwithdrawalAdd->created_at->toDayDateTimeString() }}</td>
                                            <td>
                                                <a href="" data-bs-toggle="modal" class="link-warning"
                                                    data-bs-target="#editUserWith{{ $allwithdrawalAdd->id }}">
                                                    <i data-feather="edit" aria-hidden="true"></i>
                                                </a>
                                                <a href="" data-bs-toggle="modal" class="link-danger"
                                                    data-bs-target="#deleteUserWith{{ $allwithdrawalAdd->id }}">
                                                    <i data-feather="trash-2" aria-hidden="true"></i>
                                                </a>

                                                <!-- Edit UserWithdrawal Model -->
                                                <div class="modal fade" id="editUserWith{{ $allwithdrawalAdd->id }}"
                                                    tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title text-primary">Edit User
                                                                    Withdrawal address</h4>
                                                                <a class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i class="ti-close opacity-10 text-info"></i>
                                                                </a>
                                                            </div>
                                                            <div class="modal-body" id="editPaymentModalBody">
                                                                <form class="pt-3" role="form" method="POST"
                                                                    action="{{ route('withdrawal_addresses.update', $allwithdrawalAdd->id) }}"
                                                                    id="editPayment">
                                                                    @csrf

                                                                    <div class="mb-3">
                                                                        <input type="text"
                                                                            class="form-control text-capitalize text-white"
                                                                            placeholder="User Id" disabled
                                                                            autocomplete="user_id"
                                                                            value="{{ $allwithdrawalAdd->user->name }}">
                                                                        <input type="hidden"
                                                                            class="form-control text-capitalize text-white"
                                                                            name="user_id"
                                                                            value="{{ $allwithdrawalAdd->user_id }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="text"
                                                                            class="form-control text-white"
                                                                            name="coin_address" placeholder="Coin Address"
                                                                            required autocomplete="coin_address"
                                                                            value="{{ $allwithdrawalAdd->address }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="text"
                                                                            class="form-control text-white" name="coin_name"
                                                                            placeholder="Coin name" required
                                                                            autocomplete="coin_name"
                                                                            value="{{ $allwithdrawalAdd->name }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="text"
                                                                            class="form-control text-white" name="symbole"
                                                                            placeholder="Cion Symbole" required
                                                                            autocomplete="symbole"
                                                                            value="{{ $allwithdrawalAdd->symbol }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="text"
                                                                            class="form-control text-white" name="network"
                                                                            placeholder="Cion Network" required
                                                                            autocomplete="network"
                                                                            value="{{ $allwithdrawalAdd->network }}">
                                                                    </div>

                                                                    <input type="hidden" name="_method" value="PUT">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <button type="button" class="btn btn-secondary"
                                                                            data-bs-dismiss="modal">Cancel</button>
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-md font-weight-medium auth-form-btn">
                                                                            Update Withdrawal Address
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--//Edit UserWithdrawal-->
                                            </td>
                                            {{-- <!--Delete payment --> --}}
                                            <div class="modal fade" id="deleteUserWith{{ $allwithdrawalAdd->id }}"
                                                tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title text-primary">Delete User
                                                                Withdrawal Address</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" id="DeletePAddModalBody">
                                                            <p class="text-black">
                                                                Are you sure you wish to remove this withdrawal
                                                                address?
                                                            </p>
                                                            <form method="POST"
                                                                action="{{ route('withdrawal_addresses.destroy', $allwithdrawalAdd->id) }}"
                                                                id="deleteUserWith">
                                                                @csrf
                                                                <input type="hidden" name="_method" value="DELETE">
                                                        </div>
                                                        <div class="modal-footer">
                                                            <div class="row">
                                                                <div class="col-md-12">
                                                                    <button type="button" class="btn btn-secondary"
                                                                        data-bs-dismiss="modal">No</button>
                                                                    <button type="submit"
                                                                        class="btn btn-danger btn-md font-weight-medium auth-form-btn">
                                                                        Yes
                                                                    </button>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                            {{-- <!--//Delete payment --> --}}
                                        </tr>
                                    @endforeach
                                    {{-- {{$paymentAdds->links()}} --}}
                                @else
                                    <tr>
                                        <td colspan="8"><span>No withdrawal request made yet</span></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
