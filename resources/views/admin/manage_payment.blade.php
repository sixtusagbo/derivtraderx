@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2 class="main-title">Investments</h2>

        </div>

    </div>

    <div class="row">
        <div class="col-lg-12">
            <div class="card white-block text-light border-none p-0">
                <div class="card-header">
                    <div class="alert alert-info bg-light-info text-light-info" role="alert">
                        <h5>
                            Remember to update payment status as completed when the duration has elapsed.
                        </h5>
                    </div>
                </div>
                <div class="card-body p-0 m-0">

                    <div class="table-responsive">
                        <table class="table table-hover table-secondary">
                            <thead>
                                <tr class="users-table-info">
                                    <th>S/N</th>
                                    <th>Coin Symbol</th>
                                    <th>User</th>
                                    <th>Amount</th>
                                    <th>Status</th>
                                    <th>Payment Date</th>
                                    <th>Last Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($payments->count() > 0)
                                    @foreach ($payments as $payment)
                                        <tr>
                                            <td>
                                                {{ $i++ }}
                                            </td>
                                            <td>
                                                {{ $payment->paymentAdd->symbol }}
                                            </td>
                                            <td>
                                                {{ $payment->user->username }}
                                            </td>
                                            <td>
                                                {{ $payment->amount }}
                                            </td>
                                            <td>
                                                @switch($payment->status)
                                                    @case(0)
                                                        <span class="badge-pending">Pending</span>
                                                    @break

                                                    @case(1)
                                                        <span class="badge-success">Approved</span>
                                                    @break

                                                    @case(2)
                                                        <span
                                                            class="badge bg-light-success text-light-success p-2 ms-2">Completed</span>
                                                    @break

                                                    @default
                                                @endswitch
                                            </td>
                                            <td>{{ $payment->created_at->toDayDateTimeString() }}</td>
                                            <td>{{ $payment->updated_at->toDayDateTimeString() }}</td>
                                            <td>
                                                <a href="" data-bs-toggle="modal" class="link-warning"
                                                    data-bs-target="#editPayment{{ $payment->id }}">
                                                    <i data-feather="edit" aria-hidden="true"></i>
                                                </a>
                                                <a href="" data-bs-toggle="modal" class="link-danger"
                                                    data-bs-target="#deletePayment{{ $payment->id }}">
                                                    <i data-feather="trash-2" aria-hidden="true"></i>
                                                </a>

                                                <!-- Edit Payment Model -->
                                                <div class="modal fade" id="editPayment{{ $payment->id }}" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content white-block">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title text-primary">Edit Payment</h4>
                                                                <a class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i class="ti-close opacity-10 text-info"></i>
                                                                </a>
                                                            </div>
                                                            <div class="modal-body" id="editPaymentModalBody">
                                                                <form class="pt-3" role="form" method="POST"
                                                                    action="{{ route('payments.update', $payment->id) }}"
                                                                    id="editPayment">
                                                                    @csrf

                                                                    <div class="mb-3">
                                                                        <input type="text"
                                                                            class="form-control text-capitalize text-light"
                                                                            name="" placeholder="User Id" disabled
                                                                            autocomplete="user_id"
                                                                            value="{{ $payment->user->name }}">
                                                                        <input type="hidden"
                                                                            class="form-control text-capitalize text-light"
                                                                            name="user_id" value="{{ $payment->user_id }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <select name="paymentAdd_id" id=""
                                                                            class="form-control text-light">
                                                                            @foreach ($paymentAdds as $paymentAdd)
                                                                                <option value="{{ $paymentAdd->id }}"
                                                                                    @if ($payment->paymentAdd_id == $paymentAdd->id) @selected(true) @endif>
                                                                                    {{ $paymentAdd->symbol }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <select name="plan_id" id=""
                                                                            class="form-control text-light">
                                                                            @foreach ($plans as $plan)
                                                                                <option value="{{ $plan->id }}"
                                                                                    @if ($payment->plan_id == $plan->id) @selected(true) @endif>
                                                                                    {{ $plan->name }}</option>
                                                                            @endforeach
                                                                        </select>
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <input type="number"
                                                                            class="form-control text-light" name="amount"
                                                                            placeholder="Amount" required
                                                                            autocomplete="amount"
                                                                            value="{{ $payment->amount }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <select name="status" id=""
                                                                            class="form-control text-light">
                                                                            @if ($payment->status == 0)
                                                                                <option value="0" selected>Pending
                                                                                </option>
                                                                                <option value="1">Approved</option>
                                                                                <option value="2">Completed</option>
                                                                            @elseif ($payment->status == 1)
                                                                                <option value="0">Pending</option>
                                                                                <option value="1" selected>Approved
                                                                                </option>
                                                                                <option value="2">Completed</option>
                                                                            @elseif ($payment->status == 2)
                                                                                <option value="0">Pending</option>
                                                                                <option value="1">Approved
                                                                                </option>
                                                                                <option value="2" selected>Completed
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
                                                                            Update Payment
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--//Edit payments-->
                                            </td>
                                            {{-- <!--Delete payment --> --}}
                                            <div class="modal fade" id="deletePayment{{ $payment->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content white-block">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title text-primary">Delete Payment</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" id="DeletePAddModalBody">
                                                            <p class="text-white">
                                                                Are you sure you wish to remove this payment?
                                                            </p>
                                                            <form method="POST"
                                                                action="{{ url('/admin/payment/delete/' . $payment->id) }}"
                                                                id="deletePayment">
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
                                        <td colspan="8"><span>No payment made yet</span></td>
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
