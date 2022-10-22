@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-9 col-xl-9">
            <h2 class="main-title">Withdrawal Requests</h2>
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
                                    <th>Coin Symbol</th>
                                    <th>Coin Address</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>User</th>
                                    <th>Created on</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($userWithdrawals->count() > 0)
                                    @foreach ($userWithdrawals as $userWithdrawal)
                                        <tr>
                                            <td>
                                                {{ $i++ }}
                                            </td>
                                            <td>
                                                {{ $userWithdrawal->withdrawalAdd->symbol }}
                                            </td>
                                            <td>
                                                {{ $userWithdrawal->withdrawalAdd->address }}
                                            </td>
                                            <td>
                                                {{ $userWithdrawal->amount }}
                                            </td>
                                            <td>
                                                <span>
                                                    @if ($userWithdrawal->status == 0)
                                                        <span class="badge-pending">Pending</span>
                                                    @else
                                                        <span class="badge-success">Confirmed</span>
                                                    @endif
                                                </span>
                                            </td>
                                            <td>
                                                {{ $userWithdrawal->user->username }}
                                            </td>
                                            <td>{{ $userWithdrawal->created_at->toDayDateTimeString() }}</td>
                                            <td>
                                                <a href="" data-bs-toggle="modal" class="link-warning"
                                                    data-bs-target="#editUserWith{{ $userWithdrawal->id }}">
                                                    <i data-feather="edit" aria-hidden="true"></i>
                                                </a>
                                                <a href="" data-bs-toggle="modal" class="link-danger"
                                                    data-bs-target="#deleteUserWith{{ $userWithdrawal->id }}">
                                                    <i data-feather="trash-2" aria-hidden="true"></i>
                                                </a>

                                                <!-- Edit UserWithdrawal Model -->
                                                <div class="modal fade" id="editUserWith{{ $userWithdrawal->id }}"
                                                    tabindex="-1" role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content white-block">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title text-primary">Update User Withdrawal
                                                                    request
                                                                </h4>
                                                                <a class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i class="ti-close opacity-10 text-info"></i>
                                                                </a>
                                                            </div>
                                                            <div class="modal-body" id="editPaymentModalBody">
                                                                <form class="pt-3" role="form" method="POST"
                                                                    action="{{ route('withdrawals.update', $userWithdrawal->id) }}"
                                                                    id="editPayment">
                                                                    @csrf

                                                                    <div class="mb-3">
                                                                        <input type="text"
                                                                            class="form-control text-capitalize text-white"
                                                                            name="" placeholder="User Id" disabled
                                                                            value="{{ $userWithdrawal->user->name }}">
                                                                        <input type="hidden"
                                                                            class="form-control text-white" name="user_id"
                                                                            value="{{ $userWithdrawal->user_id }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="text"
                                                                            class="form-control text-white" name=""
                                                                            placeholder="Coin name" disabled
                                                                            value="{{ $userWithdrawal->withdrawalAdd->symbol }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="text"
                                                                            class="form-control text-white" name=""
                                                                            placeholder="withdrawal_add_id" disabled
                                                                            autocomplete="withdrawal_add_id"
                                                                            value="{{ $userWithdrawal->withdrawalAdd->address }}">
                                                                        <input type="hidden"
                                                                            class="form-control text-white"
                                                                            name="withdrawal_add_id"
                                                                            value="{{ $userWithdrawal->withdrawalAdd->id }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="number"
                                                                            class="form-control text-white" name="amount"
                                                                            placeholder="Amount" required
                                                                            autocomplete="amount"
                                                                            value="{{ $userWithdrawal->amount }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <select name="status" id=""
                                                                            class="form-control text-white">
                                                                            @if ($userWithdrawal->status == 0)
                                                                                <option value="0" selected>Pending
                                                                                </option>
                                                                                <option value="1">Confirmed</option>
                                                                            @elseif ($userWithdrawal->status == 1)
                                                                                <option value="0">Pending</option>
                                                                                <option value="1" selected>Confirmed
                                                                                </option>
                                                                            @endif
                                                                        </select>
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
                                                                            Update Withdrawal Request
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
                                            <div class="modal fade" id="deleteUserWith{{ $userWithdrawal->id }}"
                                                tabindex="-1" role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content white-block">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title text-primary">Cancel User Withdrawal
                                                            </h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" id="DeletePAddModalBody">
                                                            <p class="text-white">
                                                                Are you sure you wish to remove this withdrawal?
                                                            </p>
                                                            <form method="POST"
                                                                action="{{ url('/admin/withdrawal/delete/' . $userWithdrawal->id) }}"
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
                                        <td colspan="7"><span>No withdrawal request made yet</span></td>
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
