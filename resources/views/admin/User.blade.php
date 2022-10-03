@extends('layouts.app')

@section('content')
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
        <div class="container">
            <h2 class="main-title">Users</h2>
            <div class="row stat-cards">
                <div class="col-md-6 col-xl-6">
					<article class="stat-cards-item row">
							<div class="col-9 d-flex">
								<div class="stat-cards-icon primary">
									<span class="icon user-3"></span>
									{{-- <i data-feather="bar-chart-2" aria-hidden="true"></i> --}}
								</div>
								<div class="stat-cards-info">
										<p class="stat-cards-info__num">{{$users->count()}}</p>
										<p class="stat-cards-info__title">Total users</p>
									
								</div>
							</div>
							<div class="col-3">
								<button data-bs-toggle="modal" data-bs-target="#createUser" class="btn btn-primary">+ AddUser</button>
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
                                <tr class="users-table-info">
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Date Joined</th>
									<th>Date Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($user->count() > 0)
                                    
                                    @foreach ($users as $user)
                                            
                                        <tr>
                                            <td>
                                                {{$i++}}
                                            </td>
                                            <td>
                                                {{$user->name}}
                                            </td>
                                            <td>
                                                {{$user->email}}
                                            </td>
                                            <td><span class="badge-active">Active</span></td>
                                            <td>{{$user->created_at->toDayDateTimeString()}}</td>
											<td>{{$user->updated_at->toDayDateTimeString()}}</td>
                                            <td>
                            
                                                <span class="p-relative">
                                                    <button class="dropdown-btn transparent-btn" type="button"
                                                        title="More info">
                                                        <div class="sr-only">More info</div>
                                                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="users-item-dropdown dropdown">
                                                        <li><a href="/user/view/{{$user->id}}">View</a></li>
                                                        <li><a href="##" data-bs-toggle="modal" data-bs-target="#editUser{{$user->id}}">Quick edit</a></li>
                                                        <li><a href="##" class="" data-bs-toggle="modal" data-bs-target="#deleteUser{{$user->id}}">Trash</a></li>
                                                    </ul>
                                                </span>
                        <!-- Edit user Model -->
                          <div class="modal fade" id="editUser{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-primary" >Edit User</h4>
                                  <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close opacity-10 text-info"></i>
                                  </a>
                                </div>
                                <div class="modal-body" id="editUserModalBody">
                                  <form class="pt-3" role="form" method="POST" action="{{ url('/user/update/'.$user->id)}}" id="editUser" >
                                    @csrf
                                    
                                    <div class="mb-3">
                                      <input type="text" class="form-control text-capitalize text-white" name="name" 
                                      placeholder="Name eg Charles John" required autocomplete="name" value="{{$user->name}}">
                                    </div>
                                    <div class="mb-3">
                                      <input type="email" class="form-control text-white" name="email" 
                                      placeholder="Email" required autocomplete="email" value="{{$user->email}}">
                                    </div>
                                    
                                    <div class="mb-3">
                                      <input type="text" class="form-control text-white" name="username" 
                                      placeholder="Username" required autocomplete="username" value="{{$user->username}}">
                                    </div>
                                    <input type="hidden" name="_method" value="PUT">
                                </div>
                                <div class="modal-footer">
                                  <div class="row">
                                    <div class="col-md-12">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-primary btn-md font-weight-medium auth-form-btn">
                                        Update user
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>
                          <!--//Edit user-->
                                            </td>
                            {{-- <!--Delete User--> --}}
                            <div class="modal fade" id="deleteUser{{$user->id}}" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                <div class="modal-header">
                                    <h4 class="modal-title text-primary" >Delete User</h4>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body" id="DeleteUserModalBody">
                                    <p class="text-black">
                                    Are you sure you wish to remove "{{$user->name}}"?
                                    </p>
                                    <form method="POST" action="{{ url('/user/delete/'. $user->id)}}" id="deleteUser">
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
                            {{-- <!--//Delete User--> --}}
                                        </tr>
                                            
                                    @endforeach
                                    {{$users->links()}}
                                @else
                                    <tr>
                                        <td colspan="5"><span>No user yet</span></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>

					<!-- Create user Model -->
                          <div class="modal fade" id="createUser" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                              <div class="modal-content">
                                <div class="modal-header">
                                  <h4 class="modal-title text-primary" >Create User</h4>
                                  <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close opacity-10 text-info"></i>
                                  </a>
                                </div>
                                <div class="modal-body" id="createUserModalBody">
                                  <form class="pt-3" role="form" method="POST" action="{{ url('/user/create')}}" id="createUser" >
                                    @csrf
                                    
                                    <div class="mb-3">
                                      <input type="text" class="form-control text-capitalize text-white" name="name" 
                                      placeholder="Name eg Charles John" required autocomplete="name" value="">
                                    </div>
                                    <div class="mb-3">
                                      <input type="email" class="form-control text-white" name="email" 
                                      placeholder="Email" required autocomplete="email" value="">
                                    </div>
                                    
                                    <div class="mb-3">
                                      <input type="text" class="form-control text-white" name="username" 
                                      placeholder="Username" required autocomplete="username" value="">
                                    </div>
									<div class="mb-3">
                                      <input type="password" class="form-control text-white" name="password" 
                                      placeholder="Password" required autocomplete="password" value="">
                                    </div>
									<div class="mb-3">
                                      <input type="password" class="form-control text-white" name="password_confirmation" 
                                      placeholder="Password" required autocomplete="password" value="">
									  <small class="form-text" style="color: #e91e63">
										Your password must be 6 characters long.
									</small>
                                    </div>
                                    {{-- <input type="hidden" name="_method" value="PUT"> --}}
                                </div>
                                <div class="modal-footer">
                                  <div class="row">
                                    <div class="col-md-12">
										<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                      <button type="submit" class="btn btn-primary btn-md font-weight-medium auth-form-btn">
                                        Create user
                                      </button>
                                    </div>
                                  </div>
                                </div>
                              </form>
                              </div>
                            </div>
                          </div>
                          <!--//Create user-->
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
