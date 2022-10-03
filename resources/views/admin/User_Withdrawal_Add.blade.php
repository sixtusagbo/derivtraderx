@extends('layouts.app')

@section('content')
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
        <div class="container">
            <h2 class="main-title">User Withdrawal Address</h2>
            <div class="row stat-cards">
                <div class="col-md-6 col-xl-6">
					<article class="stat-cards-item row">
							<div class="col-9 d-flex">
								<div class="stat-cards-icon primary">
									<span class="icon user-3"></span>
									{{-- <i data-feather="bar-chart-2" aria-hidden="true"></i> --}}
								</div>
								<div class="stat-cards-info">
										<p class="stat-cards-info__num">{{$paymentAdds->count()}}</p>
										<p class="stat-cards-info__title">Total address</p>
									
								</div>
							</div>
						
					</article>
                </div>
                <div class="col-md-6 col-xl-6">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon warning">
                            <span class="icon user-3"></span>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{$admins->count()}}</p>
                            <p class="stat-cards-info__title">Total Admin</p>
                            
                        </div>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12">
                    <div class="users-table table-wrapper">
                        <table class="posts-table">
                            <thead>
                                <tr class="users-table-info text-center">
                                    <th>S/N</th>
									<th>User Email</th>
                                    <th>Coin Name</th>
                                    <th>Coin Address</th>
                                    <th>Symbole</th>
									<th>Network</th>
									<th>Exchange Platform</th>
                                    <th>Date Created</th>
									<th>Date Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($paymentAdds->count() > 0)
                                    
                                    @foreach ($paymentAdds as $pAdd)
                                            
                                        <tr>
                                            <td class="text-center">
                                                {{$i++}}
                                            </td>
											<td class="text-center">
                                                {{$user->email}}
                                            </td>
                                            <td class="text-center">
                                                {{$pAdd->coin_name}}
                                            </td>
                                            <td class="text-center">
                                                {{$pAdd->coin_address}}
                                            </td>
                                            <td class="text-center">{{$pAdd->symbole}}</td>
                                            <td class="text-center">{{$pAdd->network}}</td>
                                            <td class="text-center">{{$pAdd->exchange_platform}}</td>
                                            <td class="text-center">{{$pAdd->created_at->toDayDateTimeString()}}</td>
											                      <td class="text-center">{{$pAdd->updated_at->toDayDateTimeString()}}</td>
                                            <td>
                            
                                                <span class="p-relative">
                                                    <button class="dropdown-btn transparent-btn" type="button"
                                                        title="More info">
                                                        <div class="sr-only">More info</div>
                                                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="users-item-dropdown dropdown">
                                                        <li><a href="##" data-bs-toggle="modal" data-bs-target="#editPAdd{{$pAdd->id}}">Quick edit</a></li>
                                                        <li><a href="##" class="" data-bs-toggle="modal" data-bs-target="#deletePAdd{{$pAdd->id}}">Trash</a></li>
                                                    </ul>
                                                </span>
                        <!-- Edit payment_Address Model -->
                          <div class="modal fade" id="editPAdd{{$pAdd->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-primary" >Edit Payment Address</h4>
                                  <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close opacity-10 text-info"></i>
                                  </a>
                                </div>
                                <div class="modal-body" id="editPAddModalBody">
                                  <form class="pt-3" role="form" method="POST" action="{{ url('/payment_address/update/'.$pAdd->id)}}" id="editPAdd" >
                                    @csrf
                                    
                                    <div class="mb-3">
                                      <input type="text" class="form-control text-capitalize text-white" name="coin_name" 
                                      placeholder="Name eg Charles John" required autocomplete="name" value="{{$pAdd->coin_name}}">
                                    </div>
                                    <div class="mb-3">
                                      <input type="text" class="form-control text-white" name="coin_address" 
                                      placeholder="Coin Address" required autocomplete="coin_address" value="{{$pAdd->coin_address}}">
                                    </div>
                                    <div class="mb-3">
                                      <input type="text" class="form-control text-white" name="symbole" 
                                      placeholder="Symbole eg USDT, BNB" required autocomplete="symbole" value="{{$pAdd->symbole}}">
                                    </div>
                                    <div class="mb-3">
                                      <select name="network" id="" class="form-control text-white" required>
                                        @if ($pAdd->network == 'trc20')
                                          <option value="trc20" selected>trc20</option>
                                          <option value="Bep20">Bep20</option>
                                        @endif
                                        @if ($pAdd->network == 'Bep20')
                                          <option value="trc20" >trc20</option>
                                          <option value="Bep20" selected>Bep20</option>
                                        @endif
                                      
                                      </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                      <input type="text" class="form-control text-white" name="exchange_platform" 
                                      placeholder="Exchange platform eg Okx, binance" required autocomplete="exchange_platform" value="{{$pAdd->exchange_platform}}">
                                    </div>
                                    <input type="hidden" name="_method" value="PUT">
                                </div>
                                <div class="modal-footer">
                                  <div class="row">
                                    <div class="col-md-12">
										                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-primary btn-md font-weight-medium auth-form-btn">
                                        Update
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>
                          <!--//Edit payment address-->
                                            </td>
                            {{-- <!--Delete payment address--> --}}
                            <div class="modal fade" id="deletePAdd{{$pAdd->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-primary" >Delete Payment Address</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="DeletePAddModalBody">
                                    <p class="text-black">
                                    Are you sure you wish to remove this wallet address?
                                    </p>
                                    <form method="POST" action="{{ url('/payment_address/delete/'. $pAdd->id)}}" id="deletePAdd">
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
                            {{-- <!--//Delete payment address--> --}}
                                        </tr>
                                            
                                    @endforeach
                                    {{$paymentAdds->links()}}
                                @else
                                    <tr>
                                        <td colspan="9"><span>No address for payment yet</span></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

            <!-- create payment_Address Model -->
                          <div class="modal fade" id="createPAdd" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-primary" >Create Payment Address</h4>
                                  <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close opacity-10 text-info"></i>
                                  </a>
                                </div>
                                <div class="modal-body" id="editPAddModalBody">
                                  <form class="pt-3" role="form" method="POST" action="{{ url('/payment_address/create')}}" id="editPAdd" >
                                    @csrf
                                    
                                    <div class="mb-3">
                                      <input type="text" class="form-control text-capitalize text-white" name="coin_name" 
                                      placeholder="Coin Name eg binance" required autocomplete="name" value="">
                                    </div>
                                    <div class="mb-3">
                                      <input type="text" class="form-control text-white" name="coin_address" 
                                      placeholder="Coin Address" required autocomplete="coin_address" value="">
                                    </div>
                                    <div class="mb-3">
                                      <input type="text" class="form-control text-white" name="symbole" 
                                      placeholder="Symbole eg USDT, BNB" required autocomplete="symbole" value="">
                                    </div>
                                    <div class="mb-3">
                                      <select name="network" id="" class="form-control text-white" required>
                                          <option value="" selected>Select network</option>
                                          <option value="trc20">trc20</option>
                                          <option value="Bep20">Bep20</option>
                                      </select>
                                    </div>
                                    
                                    <div class="mb-3">
                                      <input type="text" class="form-control text-white" name="exchange_platform" 
                                      placeholder="Exchange platform eg Okx, binance" required autocomplete="exchange_platform" value="">
                                    </div>
                                    {{-- <input type="hidden" name="_method" value="PUT"> --}}
                                </div>
                                <div class="modal-footer">
                                  <div class="row">
                                    <div class="col-md-12">
										                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-primary btn-md font-weight-medium auth-form-btn">
                                        Create
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>
            <!--//Create payment address-->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection