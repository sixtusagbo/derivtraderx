<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PaymentAdd;

class PaymentAddController extends Controller
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
        $paymentAdds = PaymentAdd::orderBy('created_at', 'desc')->paginate(10);
        $users = User::where('type', '0')->paginate();
        $admins = User::where('type', '1')->get();

        $data = [
            'user_id' => $user_id,
            'user' => $user,
            'paymentAdds' => $paymentAdds,
            'users' => $users,
            'admins' => $admins,
            'i' => 1
        ];

        return view('admin.Payment_add')->with($data);
    }


    /**
     * Create resource in storage.
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
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'symbol' => 'required|string|max:255',
            'network' => 'required|string|max:255',
        ]);

        $paymentAdds = new PaymentAdd();
        $paymentAdds->name = $request->input('name');
        $paymentAdds->address = $request->input('address');
        $paymentAdds->symbol = $request->input('symbol');
        $paymentAdds->network = $request->input('network');
        $paymentAdds->save();


        return redirect()->route('payment_addresses.index')->with('success', 'Payment address created successfully');
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
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'symbol' => 'required|string|max:255',
            'network' => 'required|string|max:255',
        ]);

        $paymentAdds = PaymentAdd::find($id);
        $paymentAdds->name = $request->input('name');
        $paymentAdds->address = $request->input('address');
        $paymentAdds->symbol = $request->input('symbol');
        $paymentAdds->network = $request->input('network');
        $paymentAdds->update();

        return redirect()->route('payment_addresses.index')->with('success', 'Payment address successfully updated');
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $paymentAdd = PaymentAdd::find($id);
        $paymentAdd->delete();

        return redirect()->route('payment_addresses.index')->with('success', 'Address deleted successfuly');
    }
}
