<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\PaymentAdd;

class PaymentAddController extends Controller
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
    public function create(Request $request)
    {
        //check if user trying to access the page is admin
        if (auth()->user()->type != 1) {
            return redirect('/')->with('error', 'Unauthorized Page');
        }

        //validat request details
        $this->validate($request, [
            'coin_name' => 'required|string|max:255',
            'coin_address' => 'required|string|max:255',
            'symbole' => 'required|string|max:255',
            'network' => 'required|string|max:255',
            'exchange_platform' => 'required|string|max:255',
        ]);

        $paymentAdds = new PaymentAdd();
        $paymentAdds->coin_name = $request->input('coin_name');
        $paymentAdds->coin_address = $request->input('coin_address');
        $paymentAdds->symbole = $request->input('symbole');
        $paymentAdds->network = $request->input('network');
        $paymentAdds->exchange_platform = $request->input('exchange_platform');
        
        $paymentAdds->save();

        return redirect('/admin/payment_address')->with('success', 'Payment Address successfully Created');
         
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
            'coin_name' => 'required|string|max:255',
            'coin_address' => 'required|string|max:255',
            'symbole' => 'required|string|max:255',
            'network' => 'required|string|max:255',
            'exchange_platform' => 'required|string|max:255',
        ]);

        $paymentAdds = PaymentAdd::find($id);
        $paymentAdds->coin_name = $request->input('coin_name');
        $paymentAdds->coin_address = $request->input('coin_address');
        $paymentAdds->symbole = $request->input('symbole');
        $paymentAdds->network = $request->input('network');
        $paymentAdds->exchange_platform = $request->input('exchange_platform');
        
        $paymentAdds->update();

        return redirect('/admin/payment_address')->with('success', 'Payment Address successfully updated');
         
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
        return redirect('/admin/payment_address')->with('success', 'Address deleted successfuly');
    }
}
