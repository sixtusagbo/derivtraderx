@extends('layouts.app')

@section('content')
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
        <div class="container">
            <h2 class="main-title">Investment Plans</h2>
            <div class="row stat-cards">
                <div class="col-md-6 col-xl-6">
                    <article class="stat-cards-item">
                        <div class="stat-cards-icon primary">
                            <i data-feather="bar-chart-2" aria-hidden="true"></i>
                        </div>
                        <div class="stat-cards-info">
                            <p class="stat-cards-info__num">{{ $users->count() }}</p>
                            <p class="stat-cards-info__title">Total users</p>

                        </div>
                    </article>
                </div>
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
                            <button type="submit" data-bs-toggle="modal" data-bs-target="#createPlan"
                                class="btn btn-primary">+ Plan</button>
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
                                    <th>Plan Name</th>
                                    <th>Min deposite</th>
                                    <th>Max deposite</th>
                                    <th>Bonus</th>
                                    <th>Payment period</th>
                                    <th>Date Added</th>
                                    <th>Date Updated</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($plans->count() > 0)
                                    @foreach ($plans as $plan)
                                        <tr>
                                            <td>
                                                {{ $i++ }}
                                            </td>
                                            <td>
                                                {{ $plan->plan_name }}
                                            </td>
                                            <td>
                                                ${{ $plan->min_deposite }}
                                            </td>
                                            <td>
                                                ${{ $plan->max_deposite }}
                                            </td>
                                            <td>
                                                {{ $plan->bonus }}
                                            </td>
                                            <td>{{ $plan->payment_period }}</td>
                                            <td>{{ $plan->created_at->toDayDateTimeString() }}</td>
                                            <td>{{ $plan->updated_at->toDayDateTimeString() }}</td>
                                            <td>

                                                <span class="p-relative">
                                                    <button class="dropdown-btn transparent-btn" type="button"
                                                        title="More info">
                                                        <div class="sr-only">More info</div>
                                                        <i data-feather="more-horizontal" aria-hidden="true"></i>
                                                    </button>
                                                    <ul class="users-item-dropdown dropdown">
                                                        <li><a href="/plan/view/{{ $plan->id }}">View</a></li>
                                                        <li><a href="##" data-bs-toggle="modal"
                                                                data-bs-target="#editPlan{{ $plan->id }}">Quick
                                                                edit</a></li>
                                                        <li><a href="##" class="" data-bs-toggle="modal"
                                                                data-bs-target="#deletePlan{{ $plan->id }}">Trash</a>
                                                        </li>
                                                    </ul>
                                                </span>
                                                <!-- Edit Plan Model -->
                                                <div class="modal fade" id="editPlan{{ $plan->id }}" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title text-primary">Edit Plan</h4>
                                                                <a class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i class="ti-close opacity-10 text-info"></i>
                                                                </a>
                                                            </div>
                                                            <div class="modal-body" id="editPlansModalBody">
                                                                <form class="pt-3" role="form" method="POST"
                                                                    action="{{ url('/plan/update/' . $plan->id) }}"
                                                                    id="editPlan">
                                                                    @csrf

                                                                    <div class="mb-3">
                                                                        <input type="text"
                                                                            class="form-control text-capitalize text-white"
                                                                            name="plan_name" placeholder="Plan Name"
                                                                            required autocomplete="plan_name"
                                                                            value="{{ $plan->plan_name }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="number"
                                                                            class="form-control text-white"
                                                                            name="min_deposite"
                                                                            placeholder="Minimum deposite" required
                                                                            autocomplete="min_deposite"
                                                                            value="{{ $plan->min_deposite }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="text"
                                                                            class="form-control text-white" name="bonus"
                                                                            placeholder="Investment Bonus" required
                                                                            autocomplete="bonus"
                                                                            value="{{ $plan->bonus }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="number"
                                                                            class="form-control text-white"
                                                                            name="max_deposite"
                                                                            placeholder="Maximum deposite" required
                                                                            autocomplete="max_deposite"
                                                                            value="{{ $plan->max_deposite }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <input type="text"
                                                                            class="form-control text-white"
                                                                            name="payment_period"
                                                                            placeholder="Payment Period eg 12hrs, 24hrs"
                                                                            required autocomplete="payment_period"
                                                                            value="{{ $plan->payment_period }}">
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
                                                                            Update Plan
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--//Edit Plan-->
                                            </td>
                                            {{-- <!--Delete Plan--> --}}
                                            <div class="modal fade" id="deletePlan{{ $plan->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title text-primary">Delete Plan</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" id="DeletePlanModalBody">
                                                            <p class="text-black">
                                                                Are you sure you wish to remove this plan?
                                                            </p>
                                                            <form method="POST"
                                                                action="{{ url('/plan/delete/' . $plan->id) }}"
                                                                id="deletePlan">
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
                                            {{-- <!--//Delete Plan--> --}}
                                        </tr>
                                    @endforeach
                                    {{-- {{$users->links()}} --}}
                                @else
                                    <tr>
                                        <td colspan="8"><span>No plan yet</span></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                        <!-- Create Plan Model -->
                        <div class="modal fade" id="createPlan" tabindex="-1" role="dialog" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h4 class="modal-title text-primary">Create investment plan</h4>
                                        <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                                            <i class="ti-close opacity-10 text-info"></i>
                                        </a>
                                    </div>
                                    <div class="modal-body" id="createPlanModalBody">
                                        <form class="pt-3" role="form" method="POST"
                                            action="{{ url('/plan/create') }}" id="createPlan">
                                            @csrf

                                            <div class="mb-3">
                                                <input type="text" class="form-control text-capitalize text-white"
                                                    name="plan_name" placeholder="Plan Name" required
                                                    autocomplete="plan_name" value="">
                                            </div>
                                            <div class="mb-3">
                                                <input type="number" class="form-control text-white" name="min_deposite"
                                                    placeholder="Minimum deposit" required autocomplete="min_deposite"
                                                    value="">
                                            </div>

                                            <div class="mb-3">
                                                <input type="number" class="form-control text-white" name="max_deposite"
                                                    placeholder="Maximum deposit" required autocomplete="max_deposite"
                                                    value="">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control text-white" name="bonus"
                                                    placeholder="Investment Bonus" required autocomplete="bonus"
                                                    value="">
                                            </div>
                                            <div class="mb-3">
                                                <input type="text" class="form-control text-white"
                                                    name="payment_period" placeholder="Payment Period eg 12hrs, 24hrs"
                                                    required autocomplete="payment_period" value="" />
                                                {{-- <input type="hidden" name="_method" value="PUT"> --}}
                                            </div>
                                            <div class="modal-footer">
                                                <div class="row">
                                                    <div class="col-md-12">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit"
                                                            class="btn btn-primary btn-md font-weight-medium auth-form-btn">
                                                            Create Plan
                                                        </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <!--//Create Plan-->
                        </div>
                    </div>
                </div>
            </div>
    </main>
@endsection
