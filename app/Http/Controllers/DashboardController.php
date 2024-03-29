<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// create a controller using this command 
// php artisan make:controller DashboardController

class DashboardController extends Controller
{
    public function dashboard()
    {
        return view('dashboard.dashboard');
    }

    public function terms()
    {
        return view('terms.terms');
    }
}
