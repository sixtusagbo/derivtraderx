<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPayments;
use App\Models\PaymentAdd;
use App\Models\Plans;
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
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $payments = UserPayments::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate();
        $withdrawalAdds = WithdrawalAdd::where('user_id', $user_id)->get();
        $userWithdrawals = UserWithdrawals::all();
        $paymentAdds = PaymentAdd::all();
        $plans = Plans::all();

        $data = [
            'user' => $user,
            'payments' => $payments,
            'paymentAdds' => $paymentAdds,
            'plans' => $plans,
            'withdrawalAdds' => $withdrawalAdds,
            'userWithdrawals' => $userWithdrawals,
            'i' => 1
        ];

      
        return view('user.UserWithdrawal_history')->with($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index2()
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
        $plans = Plans::all();

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
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //validat request details
        $this->validate($request, [
            'amount' => 'required|integer',
        ]);

        $userWithdrawal = new UserWithdrawals();
        $userWithdrawal->user_id = $request->input('user_id');
        $userWithdrawal->withdrawal_add_id = $request->input('withdrawal_add_id');
        $userWithdrawal->amount = $request->input('amount');
        $userWithdrawal->status = 0;
        $userWithdrawal->save();

        return redirect('withdrawal/history')->with('success', 'successfuly sent');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        return redirect('/admin/withdrawal/history')->with('success', 'successfuly updated');
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
        return redirect('/admin/withdrawal/history')->with('success', 'Request deleted successfuly');
    }
}
