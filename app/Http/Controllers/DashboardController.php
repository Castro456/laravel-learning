<?php

namespace App\Http\Controllers;

use App\Models\TwitterCloneModel;
use Illuminate\Http\Request;

// create a controller using this command 
// php artisan make:controller DashboardController

class DashboardController extends Controller
{
    
    public function dashboard()
    {
        // Basic testing to confirm that values are inserted into database tables, this is not a proper way to insert values into tbl.

        //Calling the model which has the table name
        $twitter_clone = new TwitterCloneModel([
            'content' => 'order by descending'
        ]); //If we called like this it will throw an error for security reason so in the calling model add a laravel property called fillable.

        //By doing the above we can eliminate writing these lines:
        // $twitter_clone->content ='first_value'; //content, likes are column names
        // $twitter_clone->likes = 1;

        // Un-comment it to store values
        // $twitter_clone->save(); //Inserting values/rows into 'twitter_clone' table

        // dump(TwitterCloneModel::all()); //dump shows data more cleaner
        return view('dashboard.dashboard', [
            // all() is laravel default function for getting all columns from a tbl.
            // 'twitter_content_details' => TwitterCloneModel::all() 

            // 'twitter_content_details' => TwitterCloneModel::orderBy('created_at', 'DESC')->get() //display the orders in descending based on date of creation.

            'twitter_content_details' => TwitterCloneModel::orderBy('created_at', 'DESC')->paginate(5)
        ]);
    }

    public function terms()
    {
        return view('terms.terms');
    }
}
