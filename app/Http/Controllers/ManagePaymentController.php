<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PaymentAdd;
use App\Models\UserPayments;
use App\Models\Plans;

class ManagePaymentController extends Controller
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
        $payments = UserPayments::all();
        $paymentAdds = PaymentAdd::all();
        $plans = Plans::all();
        // $newuser = User::where('type', '0')->orderBy('created_at', 'desc')->paginate();
        // $admins = User::where('type', '1')->get();

        $data = [
            'user' => $user,
            'payments' => $payments,
            'paymentAdds' => $paymentAdds,
            'plans' => $plans,
            'i' => 1
        ];

      
        return view('admin.manage_payment')->with($data);
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
        //check if user trying to access the page is admin
         if (auth()->user()->type != 1) {
            return redirect('/')->with('error', 'Unauthorized Page');
        }

        //validat request details
        $this->validate($request, [
            'amount' => 'required|integer',
        ]);

        $userPayment = new UserPayments();
        $userPayment->user_id = $request->input('user_id');
        $userPayment->paymentAdd_id = $request->input('paymentAdd_id');
        $userPayment->plans_id = $request->input('plan_id');
        if ($userPayment->plans_id == 1) {
            if (($request->input('amount') < 100) || ($request->input('amount') > 499)) {
                return redirect('/makepayment')->with('error', 'Amount for Basic plan should be >= $100 and <= $499');
            }
        }else if($userPayment->plans_id == 2)
        {
            if (($request->input('amount') < 500) || ($request->input('amount') > 4999)) {
                return redirect('/makepayment')->with('error', 'Amount for Standard plan should be >= $500 and <= $4999');
            }
        }else if($userPayment->plans_id == 3)
        {
            if (($request->input('amount') < 5000) || ($request->input('amount') > 9999)) {
                return redirect('/makepayment')->with('error', 'Amount for Medium plan should be >= $5000 and <= $9999');
            }
        }else if($userPayment->plans_id == 4)
        {
            if (($request->input('amount') < 10000)) {
                return redirect('/makepayment')->with('error', 'Amount for Professional plan should be >= $10000');
            }
        }else if($userPayment->plans_id == 5)
        {
            if (($request->input('amount') < 20000)) {
                return redirect('/makepayment')->with('error', 'Amount for VIP plan should be >= $20000');
            }
        }
        $userPayment->amount = $request->input('amount');
        $userPayment->status = $request->input('status');
        $userPayment->save();

        return redirect('/admin/payment')->with('success', 'Payment successful');
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
            'amount' => 'required|string|max:255',
        ]);

        $userPayment = UserPayments::find($id);
        $userPayment->user_id = $request->input('user_id');
        $userPayment->paymentAdd_id = $request->input('paymentAdd_id');
        $userPayment->plans_id = $request->input('plan_id');
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
