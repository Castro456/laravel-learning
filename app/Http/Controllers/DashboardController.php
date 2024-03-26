<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

// create a controller using this command 
// php artisan make:controller DashboardController

class DashboardController extends Controller
{
    public function manage_users()
    {
        return view('users.users');
    }
}
