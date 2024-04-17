<?php

namespace App\Http\Controllers;

use App\Models\TwitterCloneModel;
use App\Models\TwitterCommentsModel;
use Illuminate\Http\Request;

class TwitterCommentsController extends Controller
{
    public function create_tweet_comments(TwitterCloneModel $tweet_id)
    {
        // dd($tweet_id->id); // dd - dump and die so it won't run the below code.
        // exit();
        $tweet_comment = new TwitterCommentsModel();
        $tweet_comment->tweet_id = $tweet_id->id;
        $tweet_comment->comment = request()->get('create_tweet_comments');
        // the above line can also be written as request()->create_tweet_comments;
        $tweet_comment->save();

        return redirect()->route('show.tweet', $tweet_id)->with('success', "Comment posted successfully");
    }
}
