<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plans;
use App\Models\UserPayments;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $users = User::where('type', '0')->paginate();
        $newuser = User::where('type', '0')->orderBy('created_at', 'desc')->paginate();
        $admins = User::where('type', '1')->get();
        $plans = Plans::all();
        $userPayments = UserPayments::where('user_id', $user_id)->get();
        // dd($userPayments);

        $data = [
            'user' => $user,
            'users' => $users,
            'admins' => $admins,
            'newusers' => $newuser,
            'i' => 1
        ];

        $user_data = [
            'user' => $user,
            'users' => $users,
            'plans' => $plans,
            'i' => 1,
            'admins' => $admins,
            'userPayments' => $userPayments,
            'btcSum' => 0,
            'ethSum' => 0,
            'trxSum' => 0,
            'usdtSum' => 0,

        ];

        if ($user->type == 1) {
            return view('home')->with($data);
        }elseif($user->type == 0){
            return view('user_dash')->with($user_data);
        }
    }
}
