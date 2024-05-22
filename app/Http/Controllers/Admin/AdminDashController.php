<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminDashController extends Controller
{
    public function index() {

        // if(!Gate::allows('admin')) { //denies() - opposite of allows()
        //     abort(403);
        // }

        // $this->authorize('admin'); //shortcut for gates, but we are using the 'admin' gate in the route it self

        return view('admin.admin_dashboard');
    }
}
