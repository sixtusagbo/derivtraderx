@extends('layouts.app')

@section('content')
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
        <div class="container">
			<div class="row">
				<div class="col-md-9 col-xl-9">
					<h2 class="main-title">User Withdrawal Addresses</h2>
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
                                    <th>Coin Address</th>
                                    <th>Coin Name</th>
									<th>Symbole</th>
									<th>Network</th>
									<th>Exchange Platform</th>
                                    <th>Payment Date</th>
									<th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($allwithdrawalAdds->count() > 0)
                                    
                                    @foreach ($allwithdrawalAdds as $allwithdrawalAdd)
                                            
                                        <tr>
                                            <td>
                                                {{$i++}}
                                            </td>
                                            <td>
                                                {{$allwithdrawalAdd->coin_address}}
                                            </td>
                                            <td>
                                                {{$allwithdrawalAdd->coin_name}}
                                            </td>
											<td>
                                                {{$allwithdrawalAdd->symbole}}
                                            </td>
                                            <td>
												{{$allwithdrawalAdd->network}}
											</td>
											<td>
												{{$allwithdrawalAdd->exchange_platform}}
											</td>
                                            <td>{{$allwithdrawalAdd->created_at->toDayDateTimeString()}}</td>
											<td>
												<span class="p-relative">
                                                    <button class="dropdown-btn transparent-btn" type="button"
                                                        title="More info">
                                                        <div class="sr-only">More info</div>
                                                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="users-item-dropdown dropdown">
                                                        <li><a href="##" data-bs-toggle="modal" data-bs-target="#editUserWith{{$allwithdrawalAdd->id}}">Quick edit</a></li>
                                                        <li><a href="##" class="" data-bs-toggle="modal" data-bs-target="#deleteUserWith{{$allwithdrawalAdd->id}}">Trash</a></li>
                                                    </ul>
                                                </span>

						<!-- Edit UserWithdrawal Model -->
                          <div class="modal fade" id="editUserWith{{$allwithdrawalAdd->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-primary" >Edit User Withdrawal address</h4>
                                  <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close opacity-10 text-info"></i>
                                  </a>
                                </div>
                                <div class="modal-body" id="editPaymentModalBody">
                                  <form class="pt-3" role="form" method="POST" action="{{ url('/admin/withdrawalAdd/update/'.$allwithdrawalAdd->id)}}" id="editPayment" >
                                    @csrf
                                    
                                    <div class="mb-3">
                                      <input type="text" class="form-control text-capitalize text-white" name="" 
                                      placeholder="User Id" required autocomplete="user_id" value="{{$allwithdrawalAdd->user->name}}">
                                      <input type="hidden" class="form-control text-capitalize text-white" name="user_id" 
                                       value="{{$allwithdrawalAdd->user_id}}">
                                    </div>
									<div class="mb-3">
                                      <input type="text" class="form-control text-white" name="coin_address" 
                                      placeholder="Coin Address" required autocomplete="coin_address" value="{{$allwithdrawalAdd->coin_address}}">
                                    </div>
									<div class="mb-3">
                                      <input type="text" class="form-control text-white" name="coin_name" 
                                      placeholder="Coin name" required autocomplete="coin_name" value="{{$allwithdrawalAdd->coin_name}}">
                                    </div>
                                    <div class="mb-3">
                                      <input type="text" class="form-control text-white" name="symbole" 
                                      placeholder="Cion Symbole" required autocomplete="symbole" value="{{$allwithdrawalAdd->symbole}}">
                                    </div>
									<div class="mb-3">
                                      <input type="text" class="form-control text-white" name="network" 
                                      placeholder="Cion Network" required autocomplete="network" value="{{$allwithdrawalAdd->network}}">
                                    </div>
									<div class="mb-3">
                                      <input type="text" class="form-control text-white" name="exchange_platform" 
                                      placeholder="Exchange Platform" required autocomplete="exchange_platform" value="{{$allwithdrawalAdd->exchange_platform}}">
                                    </div>
									
                                    <input type="hidden" name="_method" value="PUT">
                                </div>
                                <div class="modal-footer">
                                  <div class="row">
                                    <div class="col-md-12">
										                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-primary btn-md font-weight-medium auth-form-btn">
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
                            <div class="modal fade" id="deleteUserWith{{$allwithdrawalAdd->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-primary" >Delete User Withdrawal Address</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="DeletePAddModalBody">
                                    <p class="text-black">
                                    Are you sure you wish to remove this withdrawal Address?
                                    </p>
                                    <form method="POST" action="{{ url('/admin/withdrawalAdd/delete/'. $allwithdrawalAdd->id)}}" id="deleteUserWith">
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
                                        <td colspan="8"><span>No withdrawal request made yet</span></td>
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