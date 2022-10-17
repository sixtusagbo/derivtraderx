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
        $allwithdrawalAdds = WithdrawalAdd::all();
        $userWithdrawals = UserWithdrawals::all();
        $paymentAdds = PaymentAdd::all();
        $plans = Plan::all();
        // $newuser = User::where('type', '0')->orderBy('created_at', 'desc')->paginate();
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

        if ($user->type == 0) {
            return view('user.WithdrawalAdd')->with($data);
        } else if ($user->type == 1) {
            return view('admin.Manage_UserWithdrawal_address')->with($Adata);
        }
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
            'coin_address' => 'required|string|max:255',
            'coin_name' => 'required|string|max:255',
            'symbole' => 'required|string|max:255',
            'network' => 'required|string|max:255',
            'exchange_platform' => 'required|string|max:255',
        ]);

        $withdrawalAdd = new WithdrawalAdd();
        $withdrawalAdd->user_id = $request->input('user_id');
        $withdrawalAdd->coin_address = $request->input('coin_address');
        $withdrawalAdd->coin_name = $request->input('coin_name');
        $withdrawalAdd->symbole = $request->input('symbole');
        $withdrawalAdd->network = $request->input('network');
        $withdrawalAdd->exchange_platform = $request->input('exchange_platform');
        $withdrawalAdd->save();

        return redirect('/withdrawalAddress')->with('success', 'Added successfuly');
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
            'coin_address' => 'required|string|max:255',
            'coin_name' => 'required|string|max:255',
            'symbole' => 'required|string|max:255',
            'network' => 'required|string|max:255',
            'exchange_platform' => 'required|string|max:255',
        ]);

        $withdrawalAdd = WithdrawalAdd::find($id);
        $withdrawalAdd->user_id = $request->input('user_id');
        $withdrawalAdd->coin_address = $request->input('coin_address');
        $withdrawalAdd->coin_name = $request->input('coin_name');
        $withdrawalAdd->symbole = $request->input('symbole');
        $withdrawalAdd->network = $request->input('network');
        $withdrawalAdd->exchange_platform = $request->input('exchange_platform');
        $withdrawalAdd->update();

        return redirect('/admin/withdrawalAdd')->with('success', 'successfuly updated');
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
        return redirect('/admin/withdrawalAdd')->with('success', 'Request deleted successfuly');
    }
}
