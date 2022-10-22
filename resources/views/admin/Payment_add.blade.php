@extends('layouts.app')

@section('content')
    <h2 class="main-title">Payment Address</h2>
    <div class="row d-flex justify-content-center stat-cards mb-3">
        <div class="col-md-6 col-xl-6">
            <article class="stat-cards-item row">
                <div class="col-9 d-flex">
                    <div class="stat-cards-icon primary">
                        <i data-feather="file-text" aria-hidden="true"></i>
                    </div>
                    <div class="stat-cards-info">
                        <p class="stat-cards-info__num">{{ $paymentAdds->count() }}</p>
                        <p class="stat-cards-info__title">Total addresses</p>

                    </div>
                </div>
                <div class="col-3">
                    <button data-bs-toggle="modal" data-bs-target="#createPAdd" class="btn btn-primary text-light">
                        <i data-feather="plus-circle" aria-hidden="true"></i> Address
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
                                <tr class="users-table-info text-center">
                                    <th>S/N</th>
                                    <th>Name</th>
                                    <th>Coin Address</th>
                                    <th>Symbol</th>
                                    <th>Network</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($paymentAdds->count() > 0)
                                    @foreach ($paymentAdds as $pAdd)
                                        <tr>
                                            <td class="text-center">
                                                {{ $i++ }}
                                            </td>
                                            <td class="text-center">
                                                {{ $pAdd->name }}
                                            </td>
                                            <td class="text-center">
                                                {{ $pAdd->address }}
                                            </td>
                                            <td class="text-center">{{ $pAdd->symbol }}</td>
                                            <td class="text-center">{{ $pAdd->network }}</td>
                                            <td class="text-center">
                                                <a href="" data-bs-toggle="modal" class="link-warning"
                                                    data-bs-target="#editPAdd{{ $pAdd->id }}">
                                                    <i data-feather="edit" aria-hidden="true"></i>
                                                </a>
                                                <a href="" data-bs-toggle="modal" class="link-danger"
                                                    data-bs-target="#deletePAdd{{ $pAdd->id }}">
                                                    <i data-feather="trash-2" aria-hidden="true"></i>
                                                </a>
                                            </td>

                                            <!-- Edit payment_Address Model -->
                                            <div class="modal fade" id="editPAdd{{ $pAdd->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content white-block">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title text-primary">Edit Payment Address
                                                            </h4>
                                                            <a class="close" type="button" data-dismiss="modal"
                                                                aria-label="Close">
                                                                <i class="ti-close opacity-10 text-info"></i>
                                                            </a>
                                                        </div>
                                                        <div class="modal-body" id="editPAddModalBody">
                                                            <form class="pt-3" role="form" method="POST"
                                                                action="{{ route('payment_addresses.update', $pAdd->id) }}"
                                                                id="editPAdd">
                                                                @csrf

                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Coin
                                                                        Name</label>
                                                                    <input type="text"
                                                                        class="form-control text-capitalize text-white"
                                                                        name="name" placeholder="Name eg Bitcoin"
                                                                        required autocomplete="name"
                                                                        value="{{ $pAdd->name }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Coin
                                                                        Address</label>
                                                                    <input type="text" class="form-control text-white"
                                                                        name="address" placeholder="Coin Address" required
                                                                        autocomplete="address"
                                                                        value="{{ $pAdd->address }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Coin
                                                                        Symbol</label>
                                                                    <input type="text" class="form-control text-white"
                                                                        name="symbol" placeholder="Symbol eg USDT, BNB"
                                                                        required autocomplete="symbol"
                                                                        value="{{ $pAdd->symbol }}">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label for="" class="form-label">Coin
                                                                        Network</label>
                                                                    <input type="text" class="form-control text-white"
                                                                        name="network" required autocomplete="network"
                                                                        value="{{ $pAdd->network }}">
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
                                            <div class="modal fade" id="deletePAdd{{ $pAdd->id }}" tabindex="-1"
                                                role="dialog" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content white-block">
                                                        <div class="modal-header">
                                                            <h4 class="modal-title text-primary">Delete Payment Address
                                                            </h4>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body" id="DeletePAddModalBody">
                                                            <p class="text-light">
                                                                Are you sure you wish to remove this wallet address?
                                                            </p>
                                                            <form method="POST"
                                                                action="{{ url('/payment_address/delete/' . $pAdd->id) }}"
                                                                id="deletePAdd">
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
                                            {{-- <!--//Delete payment address--> --}}
                                        </tr>
                                    @endforeach
                                    {{ $paymentAdds->links() }}
                                @else
                                    <tr>
                                        <td colspan="9"><span>No address for payment yet</span></td>
                                    </tr>
                                @endif
                            </tbody>
                        </table>
                    </div>
                </div>

                <!-- create payment_Address Model -->
                <div class="modal fade" id="createPAdd" tabindex="-1" role="dialog" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content white-block">
                            <div class="modal-header">
                                <h4 class="modal-title text-primary">Create Payment Address</h4>
                                <a class="close" type="button" data-dismiss="modal" aria-label="Close">
                                    <i class="ti-close opacity-10 text-info"></i>
                                </a>
                            </div>
                            <div class="modal-body" id="createPAddModalBody">
                                <form class="pt-3" role="form" method="POST"
                                    action="{{ route('payment_addresses.store') }}" id="createPAdd">
                                    @csrf

                                    <div class="mb-3">
                                        <input type="text" class="form-control text-capitalize text-white"
                                            name="name" placeholder="Coin Name eg Tronx" required autocomplete="name"
                                            value="">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control text-white" name="address"
                                            placeholder="Coin Address" required value="">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control text-white" name="symbol"
                                            placeholder="Coin Symbol eg TRX" required value="">
                                    </div>
                                    <div class="mb-3">
                                        <input type="text" class="form-control text-white" name="network"
                                            placeholder="Coin Network eg TRC-20" required value="">
                                    </div>
                            </div>
                            <div class="modal-footer">
                                <div class="row">
                                    <div class="col-md-12">
                                        <button type="button" class="btn btn-secondary"
                                            data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit"
                                            class="btn btn-primary btn-md font-weight-medium auth-form-btn">
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
@endsection
