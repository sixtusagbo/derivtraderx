<?php

namespace App\Http\Controllers;

use App\Models\PaymentAdd;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;
use App\Models\UserPayments;
use Illuminate\Support\Facades\Auth;

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
            'ethSum' => $ethPayments->sum->amount,
            'trxSum' => $trxPayments->sum->amount,
            'usdtSum' => $usdtPayments->sum->amount,
            'btcSum' => $btcPayments->sum->amount,
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
     * Place withdrawal
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function withdraw()
    {
        $withdrawalAddresses = auth()->user()->withdrawalAddresses;

        $data = [
            'withdrawalAddresses' => $withdrawalAddresses,
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
        // return auth()->user()->payments->find(1)->Plan; //? Debugging
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
