<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserPayments;
use App\Models\PaymentAdd;
use App\Models\Plans;

class UserPaymentController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $payments = UserPayments::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate();
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

      
        return view('user.UserPayment')->with($data);
    
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
        $userPayment->status = 0;
        $userPayment->save();

        return redirect('/makepayment')->with('success', 'Payment successful');
    }

    public function history()
    {
        $user_id = Auth()->user()->id;
        $payments = UserPayments::where('user_id', $user_id)->orderBy('created_at', 'desc')->paginate();
        $allpayments = UserPayments::all();

        $data = [
            'allpayments' => $allpayments,
            'payments' => $payments,
            'i' => 1
        ];
        // dd($data);

        return view('user.UserPaymentHistory')->with($data);
    }
}
