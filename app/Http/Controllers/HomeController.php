<?php

namespace App\Http\Controllers;

use App\Models\PaymentAdd;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;
use App\Models\UserPayments;
use App\Models\WithdrawalAdd;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware(['auth', 'verified']);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = auth()->user();
        $users = User::where('type', '0')->paginate();
        $newusers = User::where('type', '0')->orderBy('created_at', 'desc')->paginate();
        $admins = User::where('type', '1')->get();
        $ethPayments = $user->payments->where('payment_add_id', self::getCoinIdWithSymbol('ETH'));
        $usdtPayments = $user->payments->where('payment_add_id', self::getCoinIdWithSymbol('USDT'));
        $trxPayments = $user->payments->where('payment_add_id', self::getCoinIdWithSymbol('TRX'));
        $btcPayments = $user->payments->whereNotIn('payment_add_id', [self::getCoinIdWithSymbol('ETH'), self::getCoinIdWithSymbol('USDT'), self::getCoinIdWithSymbol('TRX')]);
        $userPayments = $user->payments->where('status', 1);
        $userWithdrawals = $user->withrawals->where('status', 1);
        $completedPlans = $user->payments->where('status', 2);
        $planEarnings = 0;
        foreach ($completedPlans as $payment) {
            $planEarnings += ($payment->plan->return / 100) * $payment->amount;
        }
        $userReferralEarnings = config('referral.worth', 2) * $user->referrals->count();
        $allEarnings = $planEarnings + $userReferralEarnings;
        $userNetWorth = $userPayments->sum->amount + $allEarnings;
        // return $userPayments->take(5); //? Debugging

        $data = [
            'users' => $users,
            'admins' => $admins,
            'pendingPayments' => UserPayments::where('status', 1)->count(),
            'pendingWithdrawals' => UserPayments::where('status', 0)->count(),
        ];

        $user_data = [
            'admins' => $admins,
            'ethSum' => $ethPayments->where('status', 1)->sum->amount,
            'trxSum' => $trxPayments->where('status', 1)->sum->amount,
            'usdtSum' => $usdtPayments->where('status', 1)->sum->amount,
            'btcSum' => $btcPayments->where('status', 1)->sum->amount,
            'userPayments' => $userPayments,
            'userWithdrawals' => $userWithdrawals,
            'totalDeposits' => $userPayments->sum->amount,
            'userNetWorth' => $userNetWorth,
            'allEarnings' => $allEarnings,
        ];

        if ($user->type == 1) {
            return view('admin.home')->with($data);
        } elseif ($user->type == 0) {
            return view('user.user_dash')->with($user_data);
        }
    }

    /**
     * Get coin id
     * 
     * @param  String $symbol
     * @return int $id
     */
    protected function getCoinIdWithSymbol(String $symbol)
    {
        return PaymentAdd::where('symbol', $symbol)->first()->id;
    }

    /**
     * Make a deposit.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function deposit()
    {
        $plans = Plan::all();
        $paymentAddresses = PaymentAdd::all();

        $data = [
            'plans' => $plans,
            'paymentAddresses' => $paymentAddresses,
        ];

        return view('user.deposit')->with($data);
    }

    /**
     * Save or cancel a deposit request process.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function confirm_deposit(Request $request)
    {
        $values = $request->validate([
            'plan_id' => 'required',
            'amount' => 'required',
            'payment_address_id' => 'required',
        ]);

        $plan = Plan::find($values['plan_id']);
        $paymentAddress = PaymentAdd::find($values['payment_address_id']);
        $amount = $values['amount'];

        if ($amount < $plan->min_deposit) {
            $amount = $plan->min_deposit;
        }

        $data = [
            'plan' => $plan,
            'paymentAddress' => $paymentAddress,
            'amount' => $amount,
            'mainPaymentAddressSymbols' => collect(['BTC', 'ETH', 'USDT', 'TRX']),
        ];

        return view('user.confirm_deposit')->with($data);
    }

    /**
     * Create payment
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create_deposit(Request $request)
    {
        $values = $request->validate([
            'plan_id' => 'required',
            'amount' => 'required',
            'payment_address_id' => 'required',
        ]);

        $payment = new UserPayments();
        $payment->user_id = auth()->user()->id;
        $payment->payment_add_id = $values['payment_address_id'];
        $payment->plan_id = $values['plan_id'];
        $payment->amount = $values['amount'];
        $payment->save();

        return redirect()->route('my_deposits')->with('success', 'Deposit created and pending confirmation!');
    }

    /**
     * Place withdrawal
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function withdraw()
    {
        $user = auth()->user();
        $ethPayments = $user->payments->where('payment_add_id', self::getCoinIdWithSymbol('ETH'));
        $usdtPayments = $user->payments->where('payment_add_id', self::getCoinIdWithSymbol('USDT'));
        $trxPayments = $user->payments->where('payment_add_id', self::getCoinIdWithSymbol('TRX'));
        $btcPayments = $user->payments->whereNotIn('payment_add_id', [self::getCoinIdWithSymbol('ETH'), self::getCoinIdWithSymbol('USDT'), self::getCoinIdWithSymbol('TRX')]);
        $userPayments = $user->payments->where('status', 1);
        $completedPlans = $user->payments->where('status', 2);
        $planEarnings = 0;
        foreach ($completedPlans as $payment) {
            $planEarnings += ($payment->plan->return / 100) * $payment->amount;
        }
        $userReferralEarnings = config('referral.worth', 2) * $user->referrals->count();
        $allEarnings = $planEarnings + $userReferralEarnings;
        $userNetWorth = $userPayments->sum->amount + $allEarnings;
        $tangibleReferralVolume = config('referral.worth', 2) * 50;
        $withdrawalAddresses = $user->withdrawalAddresses;
        $pluckedWithdrawalAddresses = $withdrawalAddresses->pluck('symbol', 'id');

        $data = [
            'withdrawalAddresses' => $withdrawalAddresses,
            'pluckedWithdrawalAddresses' => $pluckedWithdrawalAddresses,
            'ethPayments' => $ethPayments,
            'trxPayments' => $trxPayments,
            'usdtPayments' => $usdtPayments,
            'btcPayments' => $btcPayments,
            'userNetWorth' => $userNetWorth,
            'allEarnings' => $allEarnings,
            'planEarnings' => $planEarnings,
            'withdrawals' => $user->withdrawals,
            'pendingWithdrawals' => $user->withdrawals->where('status', 0)->sum->amount,
            'referralEarnings' => $userReferralEarnings,
            'tangibleReferralVolume' => $tangibleReferralVolume,
        ];

        return view('user.withdrawal')->with($data);
    }

    /**
     * User Deposits list.
     * View all depposits made by a user
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function my_deposits()
    {
        // return auth()->user()->payments->find(1)->paymentAdd; //? Debugging
        $plans = Plan::all();
        $currentUserPayments = auth()->user()->payments;

        $data = [
            'plans' => $plans,
            'currentUserPayments' => $currentUserPayments,
        ];

        return view('user.my_deposits')->with($data);
    }

    /**
     * Add or update user wallet address
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function user_addresses(Request $request)
    {
        $values = $request->validate([
            'symbol' => 'required',
            'name' => 'required',
            'network' => 'required',
            'address' => 'required',
        ]);

        // following DRY principle
        $user = auth()->user();
        $symbol = $values['symbol'];
        $newAddress = $values['address'];

        if ($user->withdrawalAddresses->contains('symbol', $symbol)) {
            $paymentAddress = WithdrawalAdd::where('symbol', $symbol)->first();
            $paymentAddress->address = $newAddress;
            $paymentAddress->update();
        } else {
            $paymentAddress = new WithdrawalAdd();
            $paymentAddress->user_id = $user->id;
            $paymentAddress->address = $newAddress;
            $paymentAddress->name = $values['name'];
            $paymentAddress->symbol = $symbol;
            $paymentAddress->network = $values['network'];
            $paymentAddress->save();
        }

        return redirect()->route('withdraw')->with('success', 'Withdrawal addresses updated succesfully');
    }

    /**
     * User referrals overview
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function referrals()
    {
        return view('user.referrals');
    }

    /**
     * Show banner for advertisements
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function banners()
    {
        return view('user.banners');
    }

    /**
     * Show trading exchange
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function exchange()
    {
        return view('user.exchange');
    }

    /**
     * Show trading exchange
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function security()
    {
        return view('user.security');
    }

    /**
     * Update user security settings
     * 
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function sec_settings(Request $request)
    {
        $newVal = $request->validate([
            'ip' => 'required|integer',
            'browser' => 'required|integer',
        ]);

        $user = User::find(auth()->user()->id);
        $user->ip_change = $newVal['ip'];
        $user->browser_change = $newVal['browser'];
        $user->update();

        return redirect()->route('home')->with('success', 'Security settings updated successfully');
    }
}
