@extends('layouts.app')

@section('content')
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
        <div class="container">
			<div class="row">
				<div class="col-md-9 col-xl-9">
					<h2 class="main-title">Withdrawal History</h2>
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
                                    <th>Coin Name</th>
									<th>Amount</th>
                                    <th>Status</th>
                                    <th>Payment Date</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($userWithdrawals->count() > 0)
                                    
                                    @foreach ($userWithdrawals as $userWithdrawal)
                                            
                                        <tr>
                                            <td>
                                                {{$i++}}
                                            </td>
                                            <td>
                                                {{$userWithdrawal->withdrawalAdd->symbole}}
                                            </td>
                                            <td>
                                                {{$userWithdrawal->withdrawalAdd->coin_name}}
                                            </td>
											<td>
                                                {{$userWithdrawal->amount}}
                                            </td>
                                            <td><span>
												@if ($userWithdrawal->status == 0)
													Pending
												@else
													Confirmed
												@endif
											</span></td>
                                            <td>{{$userWithdrawal->created_at->toDayDateTimeString()}}</td>
											<td>
												<span class="p-relative">
                                                    <button class="dropdown-btn transparent-btn" type="button"
                                                        title="More info">
                                                        <div class="sr-only">More info</div>
                                                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="users-item-dropdown dropdown">
                                                        <li><a href="##" data-bs-toggle="modal" data-bs-target="#editUserWith{{$userWithdrawal->id}}">Quick edit</a></li>
                                                        <li><a href="##" class="" data-bs-toggle="modal" data-bs-target="#deleteUserWith{{$userWithdrawal->id}}">Trash</a></li>
                                                    </ul>
                                                </span>

						<!-- Edit UserWithdrawal Model -->
                          <div class="modal fade" id="editUserWith{{$userWithdrawal->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-primary" >Edit User Withdrawal address</h4>
                                  <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close opacity-10 text-info"></i>
                                  </a>
                                </div>
                                <div class="modal-body" id="editPaymentModalBody">
                                  <form class="pt-3" role="form" method="POST" action="{{ url('/admin/withdrawal/update/'.$userWithdrawal->id)}}" id="editPayment" >
                                    @csrf
                                    
                                    <div class="mb-3">
                                      <input type="text" class="form-control text-capitalize text-white" name="" 
                                      placeholder="User Id" required autocomplete="user_id" value="{{$userWithdrawal->user->name}}">
                                      <input type="hidden" class="form-control text-capitalize text-white" name="user_id" 
                                       value="{{$userWithdrawal->user_id}}">
                                    </div>
									<div class="mb-3">
                                      <input type="text" class="form-control text-capitalize text-white" name="" 
                                      placeholder="withdrawal_add_id" required autocomplete="withdrawal_add_id" value="{{$userWithdrawal->withdrawalAdd->symbole}}">
                                      <input type="hidden" class="form-control text-capitalize text-white" name="withdrawal_add_id" 
                                       value="{{$userWithdrawal->withdrawal_add_id}}">
                                    </div>
                                    <div class="mb-3">
                                      <input type="number" class="form-control text-white" name="amount" 
                                      placeholder="Amount" required autocomplete="amount" value="{{$userWithdrawal->amount}}">
                                    </div>
									<div class="mb-3">
                                      <select name="status" id="" class="form-control text-white">
                                    @if ($userWithdrawal->status == 0)
                                      <option value="0" selected>Pending</option>
                                      <option value="1">Confirmed</option>
                                    @elseif ($userWithdrawal->status == 1)
                                      <option value="0">Pending</option>
                                      <option value="1" selected>Confirmed</option>
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
                            <div class="modal fade" id="deleteUserWith{{$userWithdrawal->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-primary" >Cancel User Withdrawal</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="DeletePAddModalBody">
                                    <p class="text-black">
                                    Are you sure you wish to remove this withdrawal?
                                    </p>
                                    <form method="POST" action="{{ url('/admin/withdrawal/delete/'. $userWithdrawal->id)}}" id="deleteUserWith">
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
                                        <td colspan="7"><span>No withdrawal request made yet</span></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
					
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection