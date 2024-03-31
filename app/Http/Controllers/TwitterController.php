<?php

namespace App\Http\Controllers;

use App\Models\TwitterCloneModel;
use Illuminate\Http\Request;

class TwitterController extends Controller
{
    public function create_tweet()
    {
        // dump(request()->get('create_tweet', null));

        request()->validate([
            'create_tweet' => 'required|min:5|max:100' //php name is a required, min char of 5 and max char 100
        ]);

        // From the post request get the value based on name. if name is empty take it as null
        $create_tweet = TwitterCloneModel::create([
            'content' => request()->get('create_tweet', null)
        ]);

        // return redirect()->route('dashboard'); //redirecting using route name
        return redirect('/dashboard')->with('tweet', 'Tweet created successfully!');
        //with() is a one time session, once viewed in a page will get deleted automatically
    }

    public function delete_tweet($id)
    {
        $delete_tweet = TwitterCloneModel::where('id', $id)->firstOrFail()->delete();
        //first - returns first data
        //firstOrFail - if returned data is empty return 404.

        return redirect('/dashboard')->with('tweet', 'Tweet deleted successfully!');
    }
}
