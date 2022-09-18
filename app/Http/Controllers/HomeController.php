<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;


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
        $users = User::where('type', '0')->get();
        $admins = User::where('type', '1')->get();

        $data = [
            'user' => $user,
            'users' => $users,
            'admins' => $admins,
            'i' => 1
        ];

        if ($user->type == 1) {
            return view('home')->with($data);
        }elseif($user->type == 0){
            return view('user_dashboard')->with($data);
        }
    }
}
