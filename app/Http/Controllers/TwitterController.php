<?php

namespace App\Http\Controllers;

use App\Models\TwitterCloneModel;
use Illuminate\Http\Request;

class TwitterController extends Controller
{
    public function create_tweet()
    {
        // dump(request()->get('create_tweet', null));
        // From the post request get the value based on name. if name is empty take it as null

        $create_tweet = TwitterCloneModel::create([
            'content' => request()->get('create_tweet', null)
        ]);

        // return redirect()->route('dashboard'); //redirecting using route name
        return redirect('/dashboard')->with('tweet_created', 'Tweet created successfully!');
        //with() is a one time session, once viewed in a page will get deleted automatically
    }
}
