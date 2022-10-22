<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPayments;
use App\Models\PaymentAdd;
use App\Models\Plan;
use App\Models\WithdrawalAdd;
use App\Models\UserWithdrawals;

class UserWithdrawalController extends Controller
{

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
            'amount' => 'required|integer',
        ]);

        $userWithdrawal = UserWithdrawals::find($id);
        $userWithdrawal->user_id = $request->input('user_id');
        $userWithdrawal->withdrawal_add_id = $request->input('withdrawal_add_id');
        $userWithdrawal->amount = $request->input('amount');
        $userWithdrawal->status = $request->input('status');
        $userWithdrawal->save();

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
