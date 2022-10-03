@extends('layouts.user_layout')

@section('content')
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
        <div class="container">
			<div class="row">
				<div class="col-md-6 col-xl-6">
					<h2 class="main-title">Withdrawal Address</h2>
				</div>
				<div class="col-md-3 col-xl-3">
					<button data-bs-toggle="modal" data-bs-target="#createWithAdd" class="btn btn-primary">+Add WithAddress</button>
				</div>
				<div class="col-md-3 col-xl-3">
					<button data-bs-toggle="modal" data-bs-target="#makeWithdrawal" class="btn btn-primary">Make Withdrawal</button>
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
                                @if ($withdrawalAdds->count() > 0)
                                    
                                    @foreach ($withdrawalAdds as $withdrawalAdd)
                                            
                                        <tr>
                                            <td>
                                                {{$i++}}
                                            </td>
                                            <td>
                                                {{$withdrawalAdd->coin_address}}
                                            </td>
                                            <td>
                                                {{$withdrawalAdd->coin_name}}
                                            </td>
											<td>
                                                {{$withdrawalAdd->symbole}}
                                            </td>
											<td>
                                                {{$withdrawalAdd->network}}
                                            </td>
                                            <td><span>{{$withdrawalAdd->exchange_platform}}</span></td>
                                            <td>{{$withdrawalAdd->created_at->toDayDateTimeString()}}</td>
                                      
                                        </tr>
                                            
                                    @endforeach
                                    {{-- {{$paymentAdds->links()}} --}}
                                @else
                                    <tr>
                                        <td colspan="7"><span>You have no added any withdrawal address yet</span></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
					<!-- Create WithdrawalAdd Model -->
                          <div class="modal fade" id="createWithAdd" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-primary" >Add withdrawal address</h4>
                                  <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close opacity-10 text-info"></i>
                                  </a>
                                </div>
                                <div class="modal-body" id="createWithAddModalBody">
                                  <form class="pt-3" role="form" method="POST" action="{{ url('/withdrawalAddress/new')}}" id="createWithAdd" >
                                    @csrf
                                   <div class="mb-3">
                                      <input type="text" class="form-control text-capitalize text-white" name="coin_address" 
                                      placeholder="Coin Address eg 0xbkjlkn...." required autocomplete="coin_address" value="">
                                    </div>
                                    <div class="mb-3">
                                      <input type="text" class="form-control text-capitalize text-white" name="coin_name" 
                                      placeholder="Coin name eg Etherium" required autocomplete="coin_name" value="">
                                    </div>
									<div class="mb-3">
                                      <input type="text" class="form-control text-capitalize text-white" name="symbole" 
                                      placeholder="Symbole eg USDT/ETH" required autocomplete="symbole" value="">
                                    </div>
									<div class="mb-3">
                                      <input type="text" class="form-control text-capitalize text-white" name="network" 
                                      placeholder="Network eg Bep20" required autocomplete="network" value="">
                                    </div>
									<div class="mb-3">
                                      <input type="text" class="form-control text-capitalize text-white" name="exchange_platform" 
                                      placeholder="Exchange Platform eg Binance/Coin base" required autocomplete="exchange_platform" value="">
                                    </div>
                                    <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
                                </div>
                                <div class="modal-footer">
                                  <div class="row">
                                    <div class="col-md-12">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-primary btn-md font-weight-medium auth-form-btn">
                                        Add Address
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
					<!-- request withdrawal Model -->
                          <div class="modal fade" id="makeWithdrawal" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-primary" >Make Withdrawal</h4>
                                  <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close opacity-10 text-info"></i>
                                  </a>
                                </div>
                                <div class="modal-body" id="createWithModalBody">
                                  <form class="pt-3" role="form" method="POST" action="{{ url('/withdrawal/make')}}" id="makeWithdrawal" >
                                    @csrf
                                    <div class="mb-3">
                                      <select name="withdrawal_add_id" class="form-control text-white" id="">
                                        <option value="" selected disabled>Select withdrawal address</option>
                                        @foreach ($withdrawalAdds as $withdrawalAdd)
                                          <option value="{{$withdrawalAdd->id}}">{{$withdrawalAdd->coin_name}}  {{$withdrawalAdd->symbole}} </option>
                                        @endforeach
                                      </select>
                                    </div class="mb-3">
                                      <input type="number" class="form-control text-capitalize text-white" name="amount" 
                                      placeholder="Amount" required autocomplete="amount" value="">
                                    </div>
                                    <input type="hidden" name="user_id" value="{{Auth()->user()->id}}">
                                <div class="modal-footer">
                                  <div class="row">
                                    <div class="col-md-12">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-primary btn-md font-weight-medium auth-form-btn">
                                        Withdraw
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>
                        <!--//request withdrawal -->
                </div>
            </div>
        </div>
    </main>
@endsection