<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plan;

class PlanController extends Controller
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

        $user_id = Auth()->user()->id;
        $plans = Plan::all();
        $users = User::where('type', '0')->paginate();
        $admins = User::where('type', '1')->get();

        $data = [
            'plans' => $plans,
            'user_id' => $user_id,
            'users' => $users,
            'admins' => $admins,
            "i" => 1
        ];

        return view('admin.Payment_plans')->with($data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
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

        $this->validate($request, [
            'plan_name' => 'required|string|max:255',
            'min_deposite' => 'required|integer',
            'max_deposite' => 'required|integer',
            'bonus' => 'required|string| max:255',
            'payment_period' => 'required|string|max:255',

        ]);

        $plan = new Plan();
        $plan->plan_name = $request->input('plan_name');
        $plan->min_deposite = $request->input('min_deposite');
        $plan->max_deposite = $request->input('max_deposite');
        $plan->bonus = $request->input('bonus');
        $plan->payment_period = $request->input('payment_period');

        $plan->save();

        return redirect('/admin/investment_plans')->with('success', 'Investment plan successfully Created');
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

        $this->validate($request, [
            'plan_name' => 'required|string|max:255',
            'min_deposite' => 'required|integer',
            'max_deposite' => 'required|integer',
            'bonus' => 'required|string| max:255',
            'payment_period' => 'required|string|max:255',

        ]);

        $plan = Plan::find($id);
        $plan->plan_name = $request->input('plan_name');
        $plan->min_deposite = $request->input('min_deposite');
        $plan->max_deposite = $request->input('max_deposite');
        $plan->bonus = $request->input('bonus');
        $plan->payment_period = $request->input('payment_period');

        $plan->update();

        return redirect('/investment_plans')->with('success', 'Payment plan successfully updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $plan = Plan::find($id);
        $plan->delete();
        return redirect('/investment_plans')->with('success', 'Plan deleted successfuly');
    }
}
