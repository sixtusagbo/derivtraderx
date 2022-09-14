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
        return view('core.welcome');
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
     * Show the frequently asked qusetions (faq) page
     * 
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function faq()
    {
        return view('core.faq');
    }
}
