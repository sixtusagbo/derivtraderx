<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PaymentAdd;
use App\Models\UserPayments;
use App\Models\Plan;

class ManagePaymentController extends Controller
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
        $payments = UserPayments::all();
        $paymentAdds = PaymentAdd::all();
        $Plan = Plan::all();
        // $newuser = User::where('type', '0')->orderBy('created_at', 'desc')->paginate();
        // $admins = User::where('type', '1')->get();

        $data = [
            'user' => $user,
            'payments' => $payments,
            'paymentAdds' => $paymentAdds,
            'Plan' => $Plan,
            'i' => 1
        ];


        return view('admin.manage_payment')->with($data);
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
            'amount' => 'required|string|max:255',
        ]);

        $userPayment = UserPayments::find($id);
        $userPayment->user_id = $request->input('user_id');
        $userPayment->paymentAdd_id = $request->input('paymentAdd_id');
        $userPayment->Plan_id = $request->input('plan_id');
        $userPayment->amount = $request->input('amount');
        $userPayment->status = $request->input('status');

        $userPayment->update();
        return redirect('/admin/payment')->with('success', 'Payment successfuly updated');
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

        $payment = UserPayments::find($id);
        $payment->delete();
        return redirect('/admin/payment')->with('success', 'Payment deleted successfuly');
    }
}
