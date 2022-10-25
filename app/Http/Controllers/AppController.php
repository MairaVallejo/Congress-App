<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class AppController extends Controller
{
    /**
     * Show the login view.
     *
     * @param  
     * @return Illuminate\View\View
     */
    public function index(): View
    {
        return view('dashboard.index');
    }
}
