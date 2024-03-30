<?php

namespace App\Http\Controllers;

use App\Models\TwitterClone;
use Illuminate\Http\Request;

// create a controller using this command 
// php artisan make:controller DashboardController

class DashboardController extends Controller
{
    
    public function dashboard()
    {
        // Basic testing to confirm that values are inserted into database tables, this is not a proper way to insert values into tbl.
        $twitter_clone = new TwitterClone(); //Calling the model which has the table name
        $twitter_clone->content ='first_value'; //content, likes are column names
        $twitter_clone->likes = 1;
        $twitter_clone->save(); //Inserting values/rows into 'twitter_clone' table

        return view('dashboard.dashboard');
    }

    public function terms()
    {
        return view('terms.terms');
    }
}
