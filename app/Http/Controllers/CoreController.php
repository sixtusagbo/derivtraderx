<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CoreController extends Controller
{
    /**
     * Show the site homepage
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('core.home');
    }

    /**
     * Show the site about page
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function about()
    {
        return view('core.about');
    }

    /**
     * Testing dashboard
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function test_dash()
    {
        return view('home');
    }
}
