@extends('layouts.user_layout')

@section('content')
    <div class="row">
        <div class="col-lg-12 px-5">
            <p class="text-light lh-base">copy and deposit only {{ $paymentAddress->name }} to this wallet address:</p>
            <p class="text-light mb-2 lh-base font-monospace">
                <span id="addressToCopy">{{ $paymentAddress->address }}</span>
                <span class="bg-light-info rounded-pill text-light-info p-2" onclick="copyToClipboard('addressToCopy')">Click
                    to copy</span>
            </p>
            <div class="card white-block p-0">

                <div class="card-body p-0 m-0">
                    <div class="table-responsive">
                        <table class="table table-secondary table-hover">
                            <thead>
                                <tr>
                                    <th colspan="2">Please confirm your deposit</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <th class="text-capitalize">Plan:</th>
                                    <td class="text-uppercase">{{ $plan->name . ' PLAN' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-capitalize">Profit:</th>
                                    <td>{{ $plan->return . '%' }} after {{ $plan->payment_period . ' hours' }}</td>
                                </tr>
                                <tr>
                                    <th class="text-capitalize">Principal Return:</th>
                                    <td>Yes</td>
                                </tr>
                                <tr>
                                    <th class="text-capitalize">Principal Withdraw:</th>
                                    <td>
                                        Available with
                                        0.00% fee </td>
                                </tr>

                                <tr>
                                    <th class="text-capitalize">Credit Amount:</th>
                                    <td>{{ '$' . number_format($amount, 2) }}</td>
                                </tr>
                                <tr>
                                    <th class="text-capitalize">Deposit Fee:</th>
                                    <td>0% + $0.00 (min. $0.00 max. $0.00)</td>
                                </tr>
                                <tr>
                                    <th class="text-capitalize">Debit Amount:</th>
                                    <td>{{ '$' . number_format($amount, 2) }}</td>
                                </tr>
                            </tbody>
                        </table>

                    </div>
                </div>

            </div>

            <div class="card white-block">
                <div class="card-body d-flex justify-content-center">
                    {!! Form::open(['route' => 'create_deposit']) !!}
                    {!! Form::hidden('plan_id', $plan->id) !!}
                    {!! Form::hidden('amount', $amount) !!}
                    {!! Form::hidden('payment_address_id', $paymentAddress->id) !!}

                    {!! Form::submit('Save', ['class' => 'btn btn-success']) !!}
                    <input type="button" class="btn btn-secondary" value="Cancel" onclick="document.location='/deposit'">
                    {!! Form::close() !!}

                </div>

                @if ($mainPaymentAddressSymbols->doesntContain($paymentAddress->symbol))
                    <p class="text-small fst-italic text-end text-info">
                        Deposits via altcoins other than ETH, USDT and TRX are
                        added to
                        your bitcoin value.
                    </p>
                @endif
            </div>

        </div>
    </div>
@endsection

@section('script')
    <script>
        function copyToClipboard(elementId) {
            if (document.selection) {
                var range = document.body.createTextRange();
                range.moveToElementText(document.getElementById(elementId));
                range.select().createTextRange();
                document.execCommand("copy");
            } else if (window.getSelection) {
                var range = document.createRange();
                range.selectNode(document.getElementById(elementId));
                window.getSelection().removeAllRanges(); // clear current selection
                window.getSelection().addRange(range); // to select text
                document.execCommand("copy");
                window.getSelection().removeAllRanges(); // to deselect
            }
            alert("Text has been copied, now paste in the text-area")
        }
    </script>
@endsection
