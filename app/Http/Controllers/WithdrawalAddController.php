<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPayments;
use App\Models\PaymentAdd;
use App\Models\Plan;
use App\Models\WithdrawalAdd;
use App\Models\UserWithdrawals;

class WithdrawalAddController extends Controller
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
        //check if user trying to access the route is admin
        if (auth()->user()->type != 1) {
            return redirect('/')->with('error', 'Unauthorized Page');
        }

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $payments = UserPayments::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate();
        $withdrawalAdds = WithdrawalAdd::where('user_id', $user_id)->get();
        $allwithdrawalAdds = WithdrawalAdd::all();
        $userWithdrawals = UserWithdrawals::all();
        $paymentAdds = PaymentAdd::all();
        $plans = Plan::all();
        // $admins = User::where('type', '1')->get();

        $data = [
            'user' => $user,
            'payments' => $payments,
            'paymentAdds' => $paymentAdds,
            'plans' => $plans,
            'withdrawalAdds' => $withdrawalAdds,
            'userWithdrawals' => $userWithdrawals,
            'i' => 1
        ];

        $Adata = [
            'allwithdrawalAdds' => $allwithdrawalAdds,
            'i' => 1
        ];

        return view('admin.Manage_UserWithdrawal_address')->with($Adata);
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
            'coin_address' => 'required|string|max:255',
            'coin_name' => 'required|string|max:255',
            'symbole' => 'required|string|max:255',
            'network' => 'required|string|max:255',
        ]);

        $withdrawalAdd = WithdrawalAdd::find($id);
        $withdrawalAdd->user_id = $request->input('user_id');
        $withdrawalAdd->address = $request->input('coin_address');
        $withdrawalAdd->name = $request->input('coin_name');
        $withdrawalAdd->symbol = $request->input('symbole');
        $withdrawalAdd->network = $request->input('network');
        $withdrawalAdd->update();

        return redirect()->route('withdrawal_addresses.index')->with('success', 'Successfuly updated');
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

        $withdrawalAdd = WithdrawalAdd::find($id);
        $withdrawalAdd->delete();
        return redirect()->route('withdrawal_addresses.index')->with('success', 'Deleted successfuly');
    }
}
