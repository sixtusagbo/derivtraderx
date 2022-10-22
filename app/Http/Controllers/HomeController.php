<?php

namespace App\Http\Controllers;

use App\Models\PaymentAdd;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;

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
        $newuser = User::where('type', '0')->orderBy('created_at', 'desc')->paginate();
        $admins = User::where('type', '1')->get();
        $ethPayments = $user->payments->where('payment_add_id', self::getCoinIdWithSymbol('ETH'));
        $usdtPayments = $user->payments->where('payment_add_id', self::getCoinIdWithSymbol('USDT'));
        $trxPayments = $user->payments->where('payment_add_id', self::getCoinIdWithSymbol('TRX'));
        $btcPayments = $user->payments->whereNotIn('payment_add_id', [self::getCoinIdWithSymbol('ETH'), self::getCoinIdWithSymbol('USDT'), self::getCoinIdWithSymbol('TRX')]);
        $userPayments = $user->payments->where('status', 1);
        $userWithdrawals = $user->withrawals->where('status', 1);
        //! Calculate this
        $planEarnings = 0;
        $userReferralEarnings = config('referral.worth', 2) * $user->referrals->count();
        $userNetWorth = $userPayments->sum->amount + $userReferralEarnings + $planEarnings;
        // return $userPayments->take(5); //? Debugging
        // $a = $userPayments->whereIn(paymentAdd->sy);

        $data = [
            'users' => $users,
            'admins' => $admins,
            'newusers' => $newuser,
            'i' => 1
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
            'referralEarnings' => $userReferralEarnings,
        ];

        if ($user->type == 1) {
            return view('home')->with($data);
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
        //! Calculate this
        $planEarnings = 0;
        $userPayments = $user->payments->where('status', 1);
        $userReferralEarnings = config('referral.worth', 2) * $user->referrals->count();
        $userNetWorth = $userPayments->sum->amount + $userReferralEarnings + $planEarnings;

        $data = [
            'withdrawalAddresses' => $user->withdrawalAddresses,
            'ethPayments' => $ethPayments,
            'trxPayments' => $trxPayments,
            'usdtPayments' => $usdtPayments,
            'btcPayments' => $btcPayments,
            'userNetWorth' => $userNetWorth,
        ];

        return view('user.withdrawal')->with($data);
    }

    /**
     * Create payment
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function create_deposit()
    {
        // TODO: Create payment in db

        return redirect()->route('my_deposits')->with('success', 'Deposit created and pending confirmation!');
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
     * Add user wallet address
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function user_addresses()
    {
        // TODO: Update user addresses

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
