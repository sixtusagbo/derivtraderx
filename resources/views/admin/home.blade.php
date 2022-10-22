@extends('layouts.app')

@section('content')
    <h2 class="main-title">Admin Panel</h2>
    <div class="row stat-cards">
        <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
                <div class="stat-cards-icon primary">
                    <i data-feather="users" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">{{ $users->count() }}</p>
                    <p class="stat-cards-info__title">Total users</p>
                </div>
            </article>
        </div>
        <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
                <div class="stat-cards-icon warning">
                    <i data-feather="lock" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">{{ $admins->count() }}</p>
                    <p class="stat-cards-info__title">Total Admin</p>
                </div>
            </article>
        </div>
        <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
                <div class="stat-cards-icon purple">
                    <i data-feather="file" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">{{ $pendingPayments }}</p>
                    <p class="stat-cards-info__title">Pending deposits</p>
                </div>
            </article>
        </div>
        <div class="col-md-6 col-xl-3">
            <article class="stat-cards-item">
                <div class="stat-cards-icon success">
                    <i data-feather="feather" aria-hidden="true"></i>
                </div>
                <div class="stat-cards-info">
                    <p class="stat-cards-info__num">{{ $pendingWithdrawals }}</p>
                    <p class="stat-cards-info__title">Pending withdrawals</p>
                </div>
            </article>
        </div>
    </div>
    <div class="row">
        <div class="col-lg-12">
            <div class="card white-block text-light border-none p-0">
                <div class="card-body p-0 m-0">
                    <div class="card-header border-0 bg-transparent p-3">
                        <h4 class="card-title">Last Deposits</h4>
                    </div>

                    <div class="table-responsive">
                        <table class="table table-hover table-secondary">
                            <thead>
                                <tr class="users-table-info">
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Joined on</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->count() > 0)
                                    @foreach ($users->take(3)->sortByDesc('created_at') as $user)
                                        <tr>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td>
                                                <span class="badge-active">Active</span>
                                            </td>
                                            <td>{{ $user->created_at->toFormattedDateString() }}</td>
                                            <td>
                                                <a href="/user/view/{{ $user->id }}" class="link-primary">
                                                    <i data-feather="eye" aria-hidden="true"></i>
                                                </a>
                                                <a href="" data-bs-toggle="modal" class="link-warning"
                                                    data-bs-target="#editUser{{ $user->id }}">
                                                    <i data-feather="edit" aria-hidden="true"></i>
                                                </a>
                                                <a href="" data-bs-toggle="modal" class="link-danger"
                                                    data-bs-target="#deleteUser{{ $user->id }}">
                                                    <i data-feather="trash-2" aria-hidden="true"></i>
                                                </a>
                                                <!-- Edit user Model -->
                                                <div class="modal fade" id="editUser{{ $user->id }}" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title text-primary">Edit User</h4>
                                                                <a class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i class="ti-close opacity-10 text-info"></i>
                                                                </a>
                                                            </div>
                                                            <div class="modal-body" id="editUserModalBody">
                                                                <form class="pt-3" role="form" method="POST"
                                                                    action="{{ url('/user/update/' . $user->id) }}"
                                                                    id="editUser">
                                                                    @csrf

                                                                    <div class="form-group">
                                                                        <input type="text"
                                                                            class="form-control text-capitalize"
                                                                            name="name"
                                                                            placeholder="Name eg Charles John" required
                                                                            autocomplete="name"
                                                                            value="{{ $user->name }}">
                                                                    </div>
                                                                    <div class="form-group">
                                                                        <input type="email" class="form-control"
                                                                            name="email" placeholder="Email" required
                                                                            autocomplete="email"
                                                                            value="{{ $user->email }}">
                                                                    </div>

                                                                    <div class="form-group">
                                                                        <input type="text" class="form-control"
                                                                            name="username" placeholder="Username" required
                                                                            autocomplete="username"
                                                                            value="{{ $user->username }}">
                                                                    </div>
                                                                    <input type="hidden" name="_method" value="PUT">
                                                            </div>
                                                            <div class="modal-footer">
                                                                <div class="row">
                                                                    <div class="col-md-12">
                                                                        <button type="submit"
                                                                            class="btn btn-primary btn-md font-weight-medium auth-form-btn">
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
                                            <div class="modal fade" id="deleteUser{{ $user->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title text-primary">Delete User</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" id="DeleteUserModalBody">
                                                            <p class="text-black">
                                                                Are you sure you wish to remove this "{{ $user->name }}"?
                                                            </p>
                                                            <form method="POST"
                                                                action="{{ url('/user/delete/' . $user->id) }}"
                                                                id="deleteUser">
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
                                            {{-- <!--//Delete User--> --}}
                                        </tr>
                                    @endforeach
                                    {{ $users->links() }}
                                @else
                                    <tr>
                                        <td colspan="5"><span>No user yet</span></td>
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
