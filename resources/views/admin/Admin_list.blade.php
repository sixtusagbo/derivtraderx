@extends('layouts.app')

@section('content')
    <h2 class="main-title">Admins</h2>
    <div class="row d-flex justify-content-center stat-cards mb-3">
        <div class="col-md-6 col-xl-6">
            <article class="stat-cards-item row">
                <div class="col-9 d-flex">
                    <div class="stat-cards-icon primary">
                        <span class="icon user-3"></span>
                    </div>
                    <div class="stat-cards-info">
                        <p class="stat-cards-info__num">{{ $admins->count() }}</p>
                        <p class="stat-cards-info__title">Total admins</p>

                    </div>
                </div>
                <div class="col-3">
                    <button type="submit" data-bs-toggle="modal" data-bs-target="#createAdmin"
                        class="btn btn-primary text-light">
                        <i data-feather="plus-circle" aria-hidden="true"></i>
                        Admin
                    </button>
                </div>
            </article>
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
                                    <th>Name</th>
                                    <th>Username</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Date Joined</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($admins->count() > 0)
                                    @foreach ($admins as $user)
                                        <tr>
                                            <td>{{ $i++ }}</td>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->username }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td><span class="badge-active">Active</span></td>
                                            <td>{{ $user->created_at->toFormattedDateString() }}</td>
                                            <td>

                                                <a href="{{ route('users.show', $user->id) }}" class="link-primary">
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

                                                <!-- Edit Admin Model -->
                                                <div class="modal fade" id="editUser{{ $user->id }}" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content white-block">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title text-primary">Edit Admin</h4>
                                                                <a class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i class="ti-close opacity-10 text-info"></i>
                                                                </a>
                                                            </div>
                                                            <div class="modal-body" id="editUserModalBody">
                                                                <form class="pt-3" role="form" method="POST"
                                                                    action="{{ route('users.update', $user->id) }}"
                                                                    id="editUser">
                                                                    @csrf

                                                                    <div class="mb-3">
                                                                        <input type="text"
                                                                            class="form-control text-capitalize text-white"
                                                                            name="name"
                                                                            placeholder="Name eg Charles John" required
                                                                            autocomplete="name"
                                                                            value="{{ $user->name }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="email"
                                                                            class="form-control text-white" name="email"
                                                                            placeholder="Email" required
                                                                            autocomplete="email"
                                                                            value="{{ $user->email }}">
                                                                    </div>

                                                                    <div class="mb-3">
                                                                        <input type="text"
                                                                            class="form-control text-white" name="username"
                                                                            placeholder="Username" required
                                                                            autocomplete="username"
                                                                            value="{{ $user->username }}">
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
                                                                            Update Admin
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--//Edit Admin-->
                                            </td>
                                            {{-- <!--Delete Admin--> --}}
                                            <div class="modal fade" id="deleteUser{{ $user->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content white-block">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title text-primary">Delete Admin</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" id="DeleteUserModalBody">
                                                            <p class="text-white">
                                                                Are you sure you wish to remove "{{ $user->name }}"?
                                                            </p>
                                                            <form method="POST"
                                                                action="{{ route('users.destroy', $user->id) }}"
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
                <!-- Create Admin Model -->
                <div class="modal fade" id="createAdmin" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content white-block">
                            <div class="modal-header">
                                <h4 class="modal-title text-primary">Create Admin</h4>
                                <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close opacity-10 text-info"></i>
                                </a>
                            </div>
                            <div class="modal-body" id="createAdminModalBody">
                                <form class="pt-3" role="form" method="POST" action="{{ route('users.store') }}"
                                    id="createAdmin">
                                    @csrf

                                    <div class="mb-3">
                                        <input type="text" class="form-control text-capitalize text-white"
                                            name="name" placeholder="Name eg Charles John" required
                                            autocomplete="name" value="">
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
                                        <select name="type" class="form-control text-white" id="">
                                            <option value="" selected disabled>Select user type</option>
                                            <option value="0" disabled>User</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control text-white" name="password"
                                            placeholder="Password" required autocomplete="password" value="">
                                    </div>
                                    <div class="mb-3">
                                        <input type="password" class="form-control text-white"
                                            name="password_confirmation" placeholder="Password" required
                                            autocomplete="password" value="">
                                        <small class="form-text" style="color: #e91e63">
                                            Your password must be 6 characters long.
                                        </small>
                                    </div>
                                    {{-- <input type="hidden" name="_method" value="PUT"> --}}
                            </div>
                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit"
                                            class="btn btn-primary btn-md font-weight-medium auth-form-btn">
                                            Create Admin
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
@endsection
