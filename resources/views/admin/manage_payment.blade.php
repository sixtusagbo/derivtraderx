@extends('layouts.app')

@section('content')
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
        <div class="container">
			<div class="row">
				<div class="col-md-9 col-xl-9">
					<h2 class="main-title">Investments</h2>
				</div>
				<div class="col-md-3 col-xl-3">
					<button data-bs-toggle="modal" data-bs-target="#createPayment" class="btn btn-primary">Create Payment</button>
				</div>
        @include('inc.messages')

			</div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="users-table table-wrapper">
                        <table class="posts-table">
                            <thead>
                                <tr class="users-table-info">
                                    <th>S/N</th>
                                    <th>Coin Symbole</th>
                                    <th>User</th>
									                  <th>Amount</th>
                                    <th>Status</th>
                                    <th>Payment Date</th>
                                    <th>Updated Date</th>
									                  <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($payments->count() > 0)
                                    
                                    @foreach ($payments as $payment)
                                            
                                        <tr>
                                            <td>
                                                {{$i++}}
                                            </td>
                                            <td>
                                                {{$payment->paymentAdd->symbole}}
                                            </td>
                                            <td>
                                                {{$payment->user->name}}
                                            </td>
											                      <td>
                                                {{$payment->amount}}
                                            </td>
                                            <td><span>
												@if ($payment->status == 0)
													Pending
												@else
													Confirmed
												@endif
											</span></td>
                                            <td>{{$payment->created_at->toDayDateTimeString()}}</td>
                                      		<td>{{$payment->updated_at->toDayDateTimeString()}}</td>
											<td>
												<span class="p-relative">
                                                    <button class="dropdown-btn transparent-btn" type="button"
                                                        title="More info">
                                                        <div class="sr-only">More info</div>
                                                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="users-item-dropdown dropdown">
                                                        <li><a href="##" data-bs-toggle="modal" data-bs-target="#editPayment{{$payment->id}}">Quick edit</a></li>
                                                        <li><a href="##" class="" data-bs-toggle="modal" data-bs-target="#deletePayment{{$payment->id}}">Trash</a></li>
                                                    </ul>
                                                </span>
						<!-- Edit Payment Model -->
                          <div class="modal fade" id="editPayment{{$payment->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-primary" >Edit Payment</h4>
                                  <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close opacity-10 text-info"></i>
                                  </a>
                                </div>
                                <div class="modal-body" id="editPaymentModalBody">
                                  <form class="pt-3" role="form" method="POST" action="{{ url('/admin/payment/update/'.$payment->id)}}" id="editPayment" >
                                    @csrf
                                    
                                    <div class="mb-3">
                                      <input type="text" class="form-control text-capitalize text-white" name="" 
                                      placeholder="User Id" required autocomplete="user_id" value="{{$payment->user->name}}">
                                      <input type="hidden" class="form-control text-capitalize text-white" name="user_id" 
                                       value="{{$payment->user_id}}">
                                    </div>
                                    <div class="mb-3">
                                      <select name="paymentAdd_id" id="" class="form-control text-white">
                                        @foreach ($paymentAdds as $paymentAdd)
                                            <option value="{{$paymentAdd->id}}"
                                            @if ($payment->paymentAdd_id == $paymentAdd->id)
                                                @selected(true)
                                            @endif
                                            >{{$paymentAdd->symbole}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="mb-3">
                                      <select name="plan_id" id="" class="form-control text-white">
                                        @foreach ($plans as $plan)
                                            <option value="{{$plan->id}}"
                                            @if ($payment->plans_id == $plan->id)
                                                @selected(true)
                                            @endif
                                            >{{$plan->plan_name}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                      <input type="number" class="form-control text-white" name="amount" 
                                      placeholder="Amount" required autocomplete="amount" value="{{$payment->amount}}">
                                    </div>
									                  <div class="mb-3">
                                      <select name="status" id="" class="form-control text-white">
                                    @if ($payment->status == 0)
                                      <option value="0" selected>Pending</option>
                                      <option value="1">Verified</option>
                                    @elseif ($payment->status == 1)
                                      <option value="0">Pending</option>
                                      <option value="1" selected>Verified</option>
                                    @endif
                                    </select>
                                    </div>
                                    <input type="hidden" name="_method" value="PUT">
                                </div>
                                <div class="modal-footer">
                                  <div class="row">
                                    <div class="col-md-12">
										                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-primary btn-md font-weight-medium auth-form-btn">
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
                            <div class="modal fade" id="deletePayment{{$payment->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-primary" >Delete Payment</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="DeletePAddModalBody">
                                    <p class="text-black">
                                    Are you sure you wish to remove this payment?
                                    </p>
                                    <form method="POST" action="{{ url('/admin/payment/delete/'. $payment->id)}}" id="deletePayment">
                                        @csrf
                                        <input type="hidden" name="_method" value="DELETE">
                                </div>
                                <div class="modal-footer">
                                    <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">No</button>
                                        <button type="submit" class="btn btn-danger btn-md font-weight-medium auth-form-btn">
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
                                <!-- Create Payment Model -->
                          <div class="modal fade" id="createPayment" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-primary" >Create Payment</h4>
                                  <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close opacity-10 text-info"></i>
                                  </a>
                                </div>
                                <div class="modal-body" id="createPaymentModalBody">
                                  <form class="pt-3" role="form" method="POST" action="{{ url('/admin/payment/new/')}}" id="editPayment" >
                                    @csrf
                                    
                                    <div class="mb-3">
                                      <input type="number" class="form-control text-capitalize text-white" name="user_id" 
                                      placeholder="User Id" required autocomplete="user_id" value="">
                                      
                                    </div>
                                    <div class="mb-3">
                                      <select name="paymentAdd_id" id="" class="form-control text-white">
                                        @foreach ($paymentAdds as $paymentAdd)
                                            <option value="{{$paymentAdd->id}}">{{$paymentAdd->symbole}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="mb-3">
                                      <select name="plan_id" id="" class="form-control text-white">
                                        @foreach ($plans as $plan)
                                            <option value="{{$plan->id}}">{{$plan->plan_name}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                      <input type="number" class="form-control text-white" name="amount" 
                                      placeholder="Amount" required autocomplete="amount" value="">
                                    </div>
									                  <div class="mb-3">
                                      <select name="status" id="" class="form-control text-white">
                                        <option value="" selected>Select Status</option>
                                        <option value="0">Pending</option>
                                        <option value="1">Confirmed</option>
                                      </select>
                                    </div>
                                    {{-- <input type="hidden" name="_method" value="PUT"> --}}
                                </div>
                                <div class="modal-footer">
                                  <div class="row">
                                    <div class="col-md-12">
										                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-primary btn-md font-weight-medium auth-form-btn">
                                        Create Payment
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>
                          <!--//create payments-->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection