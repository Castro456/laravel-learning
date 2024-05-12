<?php

namespace App\Http\Controllers;

use App\Models\TwitterCloneModel;
use Illuminate\Http\Request;

class TweetLikeController extends Controller
{
    public function like(TwitterCloneModel $tweet_id)
    {
        $liked_person = auth()->user();

        $liked_person->likes()->attach($tweet_id);

        return redirect()->route('tweet.show', $tweet_id)->with('success', 'You liked this post');
    }

    public function unlike(TwitterCloneModel $tweet_id)
    {
        $disliked_person = auth()->user();

        $disliked_person->likes()->detach($tweet_id);

        return redirect()->route('tweet.show', $tweet_id)->with('success', 'You unliked this post');
    }
}
