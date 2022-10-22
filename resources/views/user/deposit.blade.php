@extends('layouts.user_layout')

@section('content')
    {!! Form::open(['route' => 'confirm_deposit']) !!}
    <h3 class="main-title">Select plan</h3>

    <div class="row available-plans">
        @forelse ($plans as $plan)
            <div class="col-md-6 col-xl-3">
                <article class="white-block plan @if ($plan->id == 1) choice @endif">
                    <input type="radio" name="plan_id" value="{{ $plan->id }}"
                        @if ($plan->id == 1) checked="checked" @endif class="d-none">
                    <div class="plan-duration">
                        <h3 class="text-primary">{{ $plan->return . '%' }}</h3>
                        <span>
                            After @if ($plan->payment_period > 72)
                                {{ $plan->payment_period / 24 / 7 . 'wk' }}
                            @else
                                {{ $plan->payment_period . 'hrs' }}
                            @endif
                        </span>
                    </div>
                    <div class="plan-item">
                        Plan Name: <span class="value">{{ $plan->name }}</span>
                    </div>
                    <div class="plan-item">
                        Min Deposit: <span class="value">${{ number_format($plan->min_deposit, 2) }}</span>
                    </div>
                    <div class="plan-item">
                        Max Deposit: <span class="value">${{ number_format($plan->max_deposit, 2) }}</span>
                    </div>
                    <div class="plan-item">
                        Payment period: <span class="value" style="text-transform: lowercase!important;">
                            @if ($plan->payment_period > 72)
                                {{ $plan->payment_period / 24 / 7 . 'wk' }}
                            @else
                                {{ $plan->payment_period . 'hrs' }}
                            @endif
                        </span>
                    </div>
                </article>
            </div>
        @empty
            <div class="text-info">No plans yet, contact <a class="link-warning"
                    href="support@derivtraderx.com">support</a>.</div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center align-items-center flex-column mb-4">
        <label for="amount" class="form-label fs-4 mb-0">Enter amount</label>
        <input type="amount" name="amount" value="100.00" min="100.00" class="form-control w-25">
    </div>

    <div class="row payment-channels">
        <h3 class="fs-3">Payment channel</h3>

        @forelse ($paymentAddresses as $coin)
            <div class="coin @if ($coin->id == 1) choice @endif">
                <input type="radio" name="payment_address_id" value="{{ $coin->id }}"
                    @if ($coin->id == 1) checked="checked" @endif class="d-none">
                {{ $coin->name }} ({{ $coin->network }})
            </div>
        @empty
            <div class="text-info my-2 col">No coins yet, contact <a class="link-warning"
                    href="support@derivtraderx.com">support</a>.</div>
        @endforelse
    </div>

    <div class="d-flex justify-content-center">
        <button type="submit" class="btn btn-primary px-4 text-light">Make a Deposit</button>
    </div>
    {!! Form::close() !!}
@endsection

@section('script')
    <script src="{{ asset('plugins/jquery.js') }}"></script>
    <script type="text/javascript">
        (function($) {
            $('.plan').each(function(index, element) {
                // element == this
                $(element).click(function(e) {
                    e.preventDefault();
                    // strip off the choice class from all the .plan
                    $('.plan').removeClass('choice');
                    let radioInput = $(element).find('input[type=radio]').first();
                    radioInput.prop('checked', true);
                    // Make this the choice
                    $(element).addClass('choice');
                });
            });

            $('.coin').each(function(index, element) {
                // element == this
                $(element).click(function(e) {
                    e.preventDefault();
                    // strip off the choice class from all the .coin
                    $('.coin').removeClass('choice');
                    let radioInput = $(element).find('input[type=radio]').first();
                    radioInput.prop('checked', true);
                    // Make this the choice
                    $(element).addClass('choice');
                });
            });
        })(jQuery);
    </script>
@endsection
