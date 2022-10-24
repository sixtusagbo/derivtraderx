@extends('layouts.app')

@section('content')
    <h2 class="main-title">Investment Plans</h2>

    <div class="row d-flex justify-content-center stat-cards mb-3">
        <div class="col-md-6 col-xl-6">
            <article class="stat-cards-item">
                <div class="col-9 d-flex">
                    <div class="stat-cards-icon primary">
                        <i data-feather="cpu" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                        <p class="stat-cards-info__num">{{ $plans->count() }}</p>
                        <p class="stat-cards-info__title">Total plans</p>
                    </div>
                </div>
                <div class="col-3">
                    <button data-bs-toggle="modal" data-bs-target="#createPlan" class="btn btn-primary text-light">
                        <i data-feather="plus-circle" aria-hidden="true"></i>
                        Plan
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
                                <tr class="users-table-info">
                                    <th>S/N</th>
                                    <th>Plan Name</th>
                                    <th>Min deposit</th>
                                    <th>Max deposit</th>
                                    <th>Profit</th>
                                    <th>Payment period</th>
                                    <th>Date Added</th>
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
                                                {{ $plan->name }}
                                            </td>
                                            <td>
                                                ${{ $plan->min_deposit }}
                                            </td>
                                            <td>
                                                ${{ $plan->max_deposit }}
                                            </td>
                                            <td class="text-center">
                                                {{ $plan->return }}%
                                            </td>
                                            <td class="text-center">{{ $plan->payment_period }}<span
                                                    class="fst-italic">hours</span></td>
                                            <td>{{ $plan->created_at->toDayDateTimeString() }}</td>
                                            <td>
                                                <a href="" data-bs-toggle="modal" class="link-warning"
                                                    data-bs-target="#editPlan{{ $plan->id }}">
                                                    <i data-feather="edit" aria-hidden="true"></i>
                                                </a>
                                                <a href="" data-bs-toggle="modal" class="link-danger"
                                                    data-bs-target="#deletePlan{{ $plan->id }}">
                                                    <i data-feather="trash-2" aria-hidden="true"></i>
                                                </a>

                                                <!-- Edit Plan Model -->
                                                <div class="modal fade" id="editPlan{{ $plan->id }}" tabindex="-1"
                                                    role="dialog" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content white-block">
                                                            <div class="modal-header">
                                                                <h4 class="modal-title text-primary">Edit Plan</h4>
                                                                <a class="close" type="button" data-dismiss="modal"
                                                                    aria-label="Close">
                                                                    <i class="ti-close opacity-10 text-info"></i>
                                                                </a>
                                                            </div>
                                                            <div class="modal-body" id="editPlansModalBody">
                                                                <form class="pt-3" role="form" method="POST"
                                                                    action="{{ route('plans.update', $plan->id) }}"
                                                                    id="editPlan">
                                                                    @csrf

                                                                    <div class="mb-3">
                                                                        <label class="form-label">Name</label>
                                                                        <input type="text"
                                                                            class="form-control text-capitalize text-white"
                                                                            name="name" placeholder="Plan Name" required
                                                                            autocomplete="name"
                                                                            value="{{ $plan->name }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Minimum deposit</label>
                                                                        <input type="number"
                                                                            class="form-control text-white"
                                                                            name="min_deposit" placeholder="Minimum deposit"
                                                                            required autocomplete="min_deposit"
                                                                            value="{{ $plan->min_deposit }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Maximum deposit</label>
                                                                        <input type="number"
                                                                            class="form-control text-white"
                                                                            name="max_deposit" placeholder="Maximum deposit"
                                                                            required autocomplete="max_deposit"
                                                                            value="{{ $plan->max_deposit }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Profit percentage</label>
                                                                        <input type="number"
                                                                            class="form-control text-white" name="return"
                                                                            required autocomplete="return"
                                                                            value="{{ $plan->return }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Payment period(In
                                                                            hours)</label>
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
                                                    <div class="modal-content white-block">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title text-primary">Delete Plan</h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" id="DeletePlanModalBody">
                                                            <p class="text-white">
                                                                Are you sure you wish to remove this plan?
                                                            </p>
                                                            <form method="POST"
                                                                action="{{ route('plans.destroy', $plan->id) }}"
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
                    </div>
                </div>

                <!-- Create Plan Modal -->
                <div class="modal fade" id="createPlan" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content white-block">
                            <div class="modal-header">
                                <h4 class="modal-title text-primary">Create investment plan</h4>
                                <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close opacity-10 text-info"></i>
                                </a>
                            </div>
                            <div class="modal-body" id="createPlanModalBody">
                                <form class="pt-3" role="form" method="POST" action="{{ url('/plan/create') }}"
                                    id="createPlan">
                                    @csrf

                                    <div class="mb-3">
                                        <input type="text" class="form-control text-capitalize text-white"
                                            name="name" placeholder="Plan Name" required autocomplete="name"
                                            value="">
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" class="form-control text-white" name="min_deposit"
                                            placeholder="Minimum deposit" required autocomplete="min_deposit"
                                            value="">
                                    </div>

                                    <div class="mb-3">
                                        <input type="number" class="form-control text-white" name="max_deposit"
                                            placeholder="Maximum deposit" required autocomplete="max_deposit"
                                            value="">
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" class="form-control text-white" name="return"
                                            placeholder="Profit percentage" required autocomplete="return">
                                    </div>
                                    <div class="mb-3">
                                        <input type="number" class="form-control text-white" name="payment_period"
                                            placeholder="Payment Period (In hours)" required autocomplete="payment_period"
                                            value="" />
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
@endsection
