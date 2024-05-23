<?php

namespace App\Http\Controllers;

use App\Models\TwitterCloneModel;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class TwitterController extends Controller
{
    public function show_tweet(TwitterCloneModel $id)
    {
        // dd($id->twitter_comments);
        // automatically get all the details where id = id;
        return view(
            'tweet.show_single_tweet',
            [
                'content_detail' => $id //now this content_detail has all the attributes to TwitterCloneModel. (access to all methods).
            ]
        );
    }

    public function create_tweet()
    {
        // dump(request()->get('create_tweet', null));

        $validated_create_tweet = request()->validate([
            'content' => 'required|min:5|max:100' //php name is a required, min char of 5 and max char 100
        ]);

        $validated_create_tweet['user_id'] = auth()->id(); // auth()->user()->id also does the same. auth is a default fn, here we are getting logged in current user id.

        // dump(request()->all()); //'content' => request()->get('create_tweet', null) both are same, which will leave the hacker to enter their data and insert into db.
        // dd($validated_create_tweet);

        // From the post request get the value based on name. if name is empty take it as null
        // $create_tweet = TwitterCloneModel::create([
        //     'content' => request()->get('create_tweet', null)
        // ]);

        /**
         * Only mass assign the data that is validated, so hackers cant put here data into the requests.
         * 
         * Important thing is that name of the html field should be same as the database column name to use below syntax.
         * 
         */
        TwitterCloneModel::create($validated_create_tweet);

        // return redirect()->route('dashboard'); //redirecting using route name
        return redirect('/dashboard')->with('success', 'Tweet created successfully!');
        //with() is a one time session, once viewed in a page will get deleted automatically
    }

    public function delete_tweet(TwitterCloneModel $id)
    {
        // if (auth()->id() !== $id->user_id) {
        //     abort(404);
        // }

        // The above validation can be simplified like this using gate
        // $this->authorize('tweet.delete', $id);

        //Policy validation
        $this->authorize('delete', $id);

        $id->delete(); //laravel will automatically know $id is a primary key for a table. $id should be same as in the route.

        // $delete_tweet = TwitterCloneModel::where('id', $id)->firstOrFail()->delete();
        //first - returns first data
        //firstOrFail - if returned data is empty return 404.

        return redirect('/dashboard')->with('success', 'Tweet deleted successfully!');
    }

    public function edit_tweet(TwitterCloneModel $id)
    {
        // $this->authorize('tweet.edit', $id);
        $this->authorize('update', $id);

        $editing = true;

        return view(
            'tweet.show_single_tweet',
            [
                'content_detail' => $id,
                'editing' => $editing
            ]
        );
    }

    public function update_tweet(TwitterCloneModel $id)
    {
        // $this->authorize('tweet.update', $id);
        $this->authorize('update', $id);

        $validated = request()->validate([
            'content' => 'required|min:5|max:100'
        ]);

        // $id->content = request()->get('edit_tweet_content', '');
        // $id->save();

        /**
         * Only mass assign the data that is validated, so hackers cant put here data into the requests.
         * 
         * Important thing is that name of the html field should be same as the database column name to use below syntax.
         * 
         */
        $id->update($validated);

        return redirect()->route('tweet.show', $id)->with('success', "Tweet updated successfully");
    }
}
