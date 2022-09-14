@extends('layouts.core')

@section('content')
    <h2 class="text-light mt-5 fs-1 text-center faq-title">F<span class="text-primary">A</span>Q</h2>

    <div class="accordion my-5" id="faccordion">
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingOne">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                    How do I open derivtraderx account?
                </button>
            </h2>
            <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne"
                data-bs-parent="#faccordion">
                <div class="accordion-body">
                    It's quite easy and convenient. Follow this <a href="{{ route('register') }}"
                        class="link-primary text-decoration-none">link</a>, fill in the registration form and then press
                    "Register".
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingTwo">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                    How can I invest with derivtraderx.com?
                </button>
            </h2>
            <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo"
                data-bs-parent="#faccordion">
                <div class="accordion-body">
                    To make an investment you must first become a <a href="{{ route('register') }}"
                        class="link-primary text-decoration-none">member</a> of derivtraderx.com. Once you are signed up,
                    you can make your first deposit. All deposits must be made through the Members Area. You can login using
                    the member username and password you receive when you signup.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingThree">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                    I wish to invest with derivtraderx.com but I don't have any e-currency account. What
                    should I do?
                </button>
            </h2>
            <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree"
                data-bs-parent="#faccordion">
                <div class="accordion-body">
                    You can open account in <a href="https://perfectmoney.com/" target="_blank"
                        class="link-primary text-decoration-none">Perfect Money</a> or for crypto in <a
                        href="https://www.binance.com/" target="_blank"
                        class="link-primary text-decoration-none">Binance</a>.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFour">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFour" aria-expanded="false" aria-controls="collapseFour">
                    Which e-currencies do you accept?
                </button>
            </h2>
            <div id="collapseFour" class="accordion-collapse collapse" aria-labelledby="headingFour"
                data-bs-parent="#faccordion">
                <div class="accordion-body">
                    Wallets Accepted: Perfect Money, Bitcoin, Ethereum, Litecoin, DOGECoin, DASHCoin, BNB, Tron
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingFive">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseFive" aria-expanded="false" aria-controls="collapseFive">
                    How can I withdraw funds?
                </button>
            </h2>
            <div id="collapseFive" class="accordion-collapse collapse" aria-labelledby="headingFive"
                data-bs-parent="#faccordion">
                <div class="accordion-body">
                    <a href="{{ route('login') }}" class="link-primary text-decoration-none">Login</a> to your account using
                    your username and password and check the Withdrawal section.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSix">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseSix" aria-expanded="false" aria-controls="collapseSix">
                    After I make a withdrawal request, when will the funds be available on my
                    e-currency account?
                </button>
            </h2>
            <div id="collapseSix" class="accordion-collapse collapse" aria-labelledby="headingSix"
                data-bs-parent="#faccordion">
                <div class="accordion-body">
                    Minimum withdrawal amounts for Perfect Money and EPayCore are $1. For Litecoin, Dogecoin, Dash and BNB
                    are $10. For Bitcoin and Ethereum are $30 due to high gas fee costs. All payments are instant.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="headingSeven">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapseSeven" aria-expanded="false" aria-controls="collapseSeven">
                    How long does it take for my deposit to be added to my account?
                </button>
            </h2>
            <div id="collapseSeven" class="accordion-collapse collapse" aria-labelledby="headingSeven"
                data-bs-parent="#faccordion">
                <div class="accordion-body">
                    Your account will be updated as fast as you deposit.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading8">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse8" aria-expanded="false" aria-controls="collapse8">
                    What if I can't log into my account because I forgot my password?
                </button>
            </h2>
            <div id="collapse8" class="accordion-collapse collapse" aria-labelledby="heading8"
                data-bs-parent="#faccordion">
                <div class="accordion-body">
                    Follow this forgot password <a href="{{ url('password/reset') }}"
                        class="link-primary text-decoration-none">link</a> to recover your account.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading9">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse9" aria-expanded="false" aria-controls="collapse9">
                    Is a daily profit paid directly to my e-currency account?
                </button>
            </h2>
            <div id="collapse9" class="accordion-collapse collapse" aria-labelledby="heading9"
                data-bs-parent="#faccordion">
                <div class="accordion-body">
                    No, profits are gathered on your derivtraderx.com account and you can withdraw them anytime.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading10">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse10" aria-expanded="false" aria-controls="collapse10">
                    How do you calculate the interest on my account?
                </button>
            </h2>
            <div id="collapse10" class="accordion-collapse collapse" aria-labelledby="heading10"
                data-bs-parent="#faccordion">
                <div class="accordion-body">
                    It depends on the plan you choose to invest in. You can get a handy calculator <a
                        href="{{ url('/#profit-checker') }}" class="link-primary text-decoration-none">here</a>.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading11">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse11" aria-expanded="false" aria-controls="collapse11">
                    Can I make a deposit directly from my account balance?
                </button>
            </h2>
            <div id="collapse11" class="accordion-collapse collapse" aria-labelledby="heading11"
                data-bs-parent="#faccordion">
                <div class="accordion-body">
                    Yes, you can make a deposit directly from your derivtraderx.com account balance.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading12">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse12" aria-expanded="false" aria-controls="collapse12">
                    When can I access my account balances?
                </button>
            </h2>
            <div id="collapse12" class="accordion-collapse collapse" aria-labelledby="heading12"
                data-bs-parent="#faccordion">
                <div class="accordion-body">
                    You can access your account information 24/7 on the internet.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading13">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse13" aria-expanded="false" aria-controls="collapse13">
                    Can I have multiple accounts on your platform?
                </button>
            </h2>
            <div id="collapse13" class="accordion-collapse collapse" aria-labelledby="heading13"
                data-bs-parent="#faccordion">
                <div class="accordion-body">
                    No. If we find that a member has more than one account, the entire funds will be frozen.
                </div>
            </div>
        </div>
        <div class="accordion-item">
            <h2 class="accordion-header" id="heading14">
                <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse"
                    data-bs-target="#collapse14" aria-expanded="false" aria-controls="collapse14">
                    How does the referral program work?
                </button>
            </h2>
            <div id="collapse14" class="accordion-collapse collapse" aria-labelledby="heading14"
                data-bs-parent="#faccordion">
                <div class="accordion-body">
                    Invite your friends and earn money for advertising. We offer 3-tire referral program with commissions.
                </div>
            </div>
        </div>
    </div>
@endsection
