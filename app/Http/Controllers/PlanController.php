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

        $plans = Plan::all();

        $data = [
            'plans' => $plans,
            "i" => 1
        ];

        return view('admin.Payment_plans')->with($data);
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
            'name' => 'required|string|max:255',
            'min_deposit' => 'required',
            'max_deposit' => 'required',
            'return' => 'required',
            'payment_period' => 'required',

        ]);

        $plan = new Plan();
        $plan->name = $request->input('name');
        $plan->min_deposit = $request->input('min_deposit');
        $plan->max_deposit = $request->input('max_deposit');
        $plan->return = $request->input('return');
        $plan->payment_period = $request->input('payment_period');
        $plan->save();

        return redirect()->route('plans.index')->with('success', 'Investment plan successfully Created');
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
            'name' => 'required|string|max:255',
            'min_deposit' => 'required',
            'max_deposit' => 'required',
            'return' => 'required',
            'payment_period' => 'required',

        ]);

        $plan = Plan::find($id);
        $plan->name = $request->input('name');
        $plan->min_deposit = $request->input('min_deposit');
        $plan->max_deposit = $request->input('max_deposit');
        $plan->return = $request->input('return');
        $plan->payment_period = $request->input('payment_period');
        $plan->update();

        return redirect()->route('plans.index')->with('success', 'Payment plan successfully updated');
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

        return redirect()->route('plans.index')->with('success', 'Plan deleted successfuly');
    }
}
