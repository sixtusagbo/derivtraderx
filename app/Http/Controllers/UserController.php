<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Plans;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
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
        $users = User::where('type', '0')->paginate();
        $newuser = User::where('type', '0')->orderBy('created_at', 'desc')->paginate();
        $admins = User::where('type', '1')->get();
        

        $data = [
            'user' => $user,
            'users' => $users,
            'admins' => $admins,
            'newusers' => $newuser,
            'i' => 1
        ];

        return view('admin.User')->with($data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function admin_users()
    {
        //check if user trying to access the page is admin
         if (auth()->user()->type != 1) {
            return redirect('/')->with('error', 'Unauthorized Page');
        }

        $user_id = auth()->user()->id;
        $user = User::find($user_id);
        $users = User::where('type', '0')->paginate();
        $newuser = User::where('type', '0')->orderBy('created_at', 'desc')->paginate();
        $admins = User::where('type', '1')->paginate();

        $data = [
            'user' => $user,
            'users' => $users,
            'admins' => $admins,
            'newusers' => $newuser,
            'i' => 1
        ];

        return view('admin.Admin_list')->with($data);
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
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);

        $user = new User();
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->password = Hash::make($request->input('password'));
        if ($request->input('type') != null) {
            $user->type = $request->input('type');
        }
        $user->save();

        if ($request->input('type') != null) {
            return redirect('/admins')->with('success', 'Admin creadet successfully');
        }else{
            return redirect('/users')->with('success', 'User successfully Created');
        }    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        $data = [
            'user' => $user
        ];
        return view('admin.viewUser')->with($data);
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
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255',
            
        ]);

        $user = User::find($id);
        $user->name = $request->input('name');
        $user->username = $request->input('username');
        $user->email = $request->input('email');
        $user->update();

        return redirect('/home')->with('success', 'User successfully Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        $user->delete();
        return redirect('/home')->with('success', 'User deleted successfuly');
    }
}
