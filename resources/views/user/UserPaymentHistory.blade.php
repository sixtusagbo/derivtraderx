@extends('layouts.user_layout')

@section('content')
    <!-- ! Main -->
    <main class="main users chart-page" id="skip-target">
        <div class="container">
			<div class="row">
				<div class="col-md-9 col-xl-9">
					<h2 class="main-title">Payment History</h2>
				</div>

			</div>
            
            <div class="row">
                <div class="col-lg-12">
                    <div class="users-table table-wrapper">
                        <table class="posts-table">
                            <thead>
                                <tr class="users-table-info">
                                    <th>S/N</th>
                                    <th>Coin Symbole</th>
                                    <th>Coin Name</th>
									<th>Amount</th>
                                    <th>Status</th>
                                    <th>Payment Date</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if ($payments->count() > 0)
                                    
                                    @foreach ($payments as $payment)
                                            
                                        <tr>
                                            <td>
                                                {{$i++}}
                                            </td>
                                            <td>
                                                {{$payment->paymentAdd->symbole}}
                                            </td>
                                            <td>
                                                {{$payment->paymentAdd->coin_name}}
                                            </td>
											<td>
                                                {{$payment->amount}}
                                            </td>
                                            <td><span>
												@if ($payment->status == 0)
													Pending
												@else
													Confirmed
												@endif
											</span></td>
                                            <td>{{$payment->created_at->toDayDateTimeString()}}</td>
                                      
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
					
                    </div>
                </div>
            </div>
        </div>
    </main>
@endsection
