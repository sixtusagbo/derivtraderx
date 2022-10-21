@extends('layouts.app')

@section('content')
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
        <div class="container">
            <h2 class="main-title">Dashboard</h2>
            <div class="row stat-cards">
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon primary">
                            <i data-feather="bar-chart-2" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{ $users->count() }}</p>
                            <p class="stat-cards-info__title">Total users</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit success">
                                    <i data-feather="trending-up" aria-hidden="true"></i>4.07%
                                </span>
                                Last month
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon warning">
                            <i data-feather="file" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{ $admins->count() }}</p>
                            <p class="stat-cards-info__title">Total Admin</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit success">
                                    <i data-feather="trending-up" aria-hidden="true"></i>0.24%
                                </span>
                                Last month
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon purple">
                            <i data-feather="file" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">1478 286</p>
                            <p class="stat-cards-info__title">Total visits</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit danger">
                                    <i data-feather="trending-down" aria-hidden="true"></i>1.64%
                                </span>
                                Last month
                            </p>
                        </div>
                    </article>
                </div>
                <div class="col-md-6 col-xl-3">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon success">
                            <i data-feather="feather" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">1478 286</p>
                            <p class="stat-cards-info__title">Total visits</p>
                            <p class="stat-cards-info__progress">
                                <span class="stat-cards-info__profit warning">
                                    <i data-feather="trending-up" aria-hidden="true"></i>0.00%
                                </span>
                                Last month
                            </p>
                        </div>
                    </article>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-9">
                    <div class="users-table table-wrapper">
                        <table class="posts-table">
                            <thead>
                                <tr class="users-table-info">
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Email</th>
                                    <th>Status</th>
                                    <th>Date Joined</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($users->count() > 0)
                                    @foreach ($users as $user)
                                        <tr>
                                            <td>
                                                {{ $i++ }}
                                            </td>
                                            <td>
                                                {{ $user->name }}
                                            </td>
                                            <td>
                                                {{ $user->email }}
                                            </td>
                                            <td><span class="badge-active">Active</span></td>
                                            <td>{{ $user->created_at->toDayDateTimeString() }}</td>
                                            <td>

                                                <span class="p-relative">
                                                    <button class="dropdown-btn transparent-btn" type="button"
                                                        title="More info">
                                                        <div class="sr-only">More info</div>
                                                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="users-item-dropdown dropdown">
                                                        <li><a href="/user/view/{{ $user->id }}">View</a></li>
                                                        <li><a href="##" data-bs-toggle="modal"
                                                                data-bs-target="#editUser{{ $user->id }}">Quick edit</a>
                                                        </li>
                                                        <li><a href="##" class="" data-bs-toggle="modal"
                                                                data-bs-target="#deleteUser{{ $user->id }}">Trash</a>
                                                        </li>
                                                    </ul>
                                                </span>
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
                                                                            name="username" placeholder="Username"
                                                                            required autocomplete="username"
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

                <div class="col-lg-3">
                    <article class="white-block">
                        <div class="top-cat-title">
                            <h3>Top categories</h3>
                            <p>28 Categories, 1400 Posts</p>
                        </div>
                        <ul class="top-cat-list">
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Lifestyle <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Dailiy lifestyle articles <span class="purple">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Tutorials <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Coding tutorials <span class="blue">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Technology <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Dailiy technology articles <span class="danger">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        UX design <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        UX design tips <span class="success">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Interaction tips <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Interaction articles <span class="warning">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        App development <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Mobile development articles <span class="warning">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Nature <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Wildlife animal articles <span class="warning">+472</span>
                                    </div>
                                </a>
                            </li>
                            <li>
                                <a href="##">
                                    <div class="top-cat-list__title">
                                        Geography <span>8.2k</span>
                                    </div>
                                    <div class="top-cat-list__subtitle">
                                        Geography articles <span class="primary">+472</span>
                                    </div>
                                </a>
                            </li>
                        </ul>
                    </article>
                </div>
            </div>
        </div>
    </main>
@endsection
