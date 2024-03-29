<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPayments;
use App\Models\PaymentAdd;
use App\Models\Plan;
use App\Models\WithdrawalAdd;
use App\Models\UserWithdrawals;
use App\Notifications\WithdrawalApprovedNotification;
use App\Notifications\WithdrawalCreatedNotification;
use Illuminate\Support\Facades\Notification;

class UserWithdrawalController extends Controller
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //check if user trying to access the page is admin
        if (auth()->user()->type != 1) {
            return redirect('/')->with('error', 'Unauthorized Page');
        }

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $payments = UserPayments::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate();
        $withdrawalAdds = WithdrawalAdd::where('user_id', $user_id)->get();
        $userWithdrawals = UserWithdrawals::all();
        $paymentAdds = PaymentAdd::all();
        $plans = Plan::all();

        $data = [
            'user' => $user,
            'payments' => $payments,
            'paymentAdds' => $paymentAdds,
            'plans' => $plans,
            'withdrawalAdds' => $withdrawalAdds,
            'userWithdrawals' => $userWithdrawals,
            'i' => 1
        ];


        return view('admin.Manage_UserWithdrawal_history')->with($data);
    }

    /**
     * Create withdrawal
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validate request details
        $this->validate($request, [
            'withdrawal_add_id' => 'required',
            'amount' => 'required',
        ]);

        $user = auth()->user();

        $userWithdrawal = new UserWithdrawals();
        $userWithdrawal->user_id = $user->id;
        $userWithdrawal->withdrawal_add_id = $request->input('withdrawal_add_id');
        $userWithdrawal->amount = $request->input('amount');
        $userWithdrawal->status = 0;
        $userWithdrawal->save();

        Notification::send($user, new WithdrawalCreatedNotification($userWithdrawal));

        return redirect()->route('withdraw')->with('success', 'Withdrawal request submitted successfully.');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //check if user trying to access the page is admin
        if (auth()->user()->type != 1) {
            return redirect('/')->with('error', 'Unauthorized Page');
        }

        //validat request details
        $this->validate($request, [
            'amount' => 'required',
        ]);

        $user = User::find($request->input('user_id'));

        $userWithdrawal = UserWithdrawals::find($id);
        $userWithdrawal->user_id = $user->id;
        $userWithdrawal->withdrawal_add_id = $request->input('withdrawal_add_id');
        $userWithdrawal->amount = $request->input('amount');
        $userWithdrawal->status = $request->input('status');
        $userWithdrawal->save();

        Notification::send($user, new WithdrawalApprovedNotification($userWithdrawal));

        return redirect()->route('withdrawals.index')->with('success', 'successfuly updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //check if user trying to access the page is admin
        if (auth()->user()->type != 1) {
            return redirect('/')->with('error', 'Unauthorized Page');
        }

        $userWithdrawal = UserWithdrawals::find($id);
        $userWithdrawal->delete();
        return redirect()->route('withdrawals.index')->with('success', 'Request deleted successfuly');
    }
}
