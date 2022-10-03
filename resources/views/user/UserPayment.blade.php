@extends('layouts.user_layout')

@section('content')
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
        <div class="container">
			<div class="row">
				<div class="col-md-9 col-xl-9">
					<h2 class="main-title">Make Payment</h2>
				</div>
				<div class="col-md-3 col-xl-3">
					<button data-bs-toggle="modal" data-bs-target="#createPayment" class="btn btn-primary">Make Deposite</button>
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
                                    <th>Payment Address</th>
                                    <th>Coin Name</th>
                                    <th>Symbole</th>
									                  <th>Network</th>
                                    <th>Exchange platform</th>
                                    <th>Date Added</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($paymentAdds->count() > 0)
                                    
                                    @foreach ($paymentAdds as $paymentAdd)
                                            
                                        <tr>
                                            <td>
                                                {{$i++}}
                                            </td>
                                            <td>
                                                {{$paymentAdd->coin_address}}
                                            </td>
                                            <td>
                                                {{$paymentAdd->coin_name}}
                                            </td>
											<td>
                                                {{$paymentAdd->symbole}}
                                            </td>
											<td>
                                                {{$paymentAdd->network}}
                                            </td>
                                            <td><span>{{$paymentAdd->exchange_platform}}</span></td>
                                            <td>{{$paymentAdd->created_at->toDayDateTimeString()}}</td>
                                      
                                        </tr>
                                            
                                    @endforeach
                                    {{-- {{$paymentAdds->links()}} --}}
                                @else
                                    <tr>
                                        <td colspan="6"><span>No payment made yet</span></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
					<!-- Create Payment Model -->
                          <div class="modal fade" id="createPayment" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-primary" >Make Payment</h4>
                                  <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close opacity-10 text-info"></i>
                                  </a>
                                </div>
                                <div class="modal-body" id="createPaymentModalBody">
                                  <form class="pt-3" role="form" method="POST" action="{{ url('/makepayment/new')}}" id="createPayment" >
                                    @csrf
                                    <div class="mb-3">
                                      <select name="plan_id" class="form-control text-white" id="">
                                        <option value="" selected disabled>Select investment plan</option>
                                        @foreach ($plans as $plan)
                                          <option value="{{$plan->id}}">{{$plan->plan_name}}  {{$plan->bonus}} after{{$plan->payment_period}} </option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="mb-3">
                                      <select name="paymentAdd_id" class="form-control text-white" id="">
                                        <option value="" selected disabled>Select payment sddress</option>
                                        @foreach ($paymentAdds as $paymentAdd)
                                          <option value="{{$paymentAdd->id}}">({{$paymentAdd->symbole}}){{$paymentAdd->coin_address}}</option>
                                        @endforeach
                                      </select>
                                    </div>
                                    <div class="mb-3">
                                      <input type="number" class="form-control text-capitalize text-white" name="amount" 
                                      placeholder="Amount" required autocomplete="amount" value="">
                                    </div>
                                    <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
                                </div>
                                <div class="modal-footer">
                                  <div class="row">
                                    <div class="col-md-12">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-primary btn-md font-weight-medium auth-form-btn">
                                        Make Payment
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>
                        <!--//Create Admin-->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection