<?php

namespace App\Http\Controllers;

use App\Models\TwitterCloneModel;
// use App\Models\User;
use Illuminate\Http\Request;

/**
 * Only see the tweets of the person that you are following
 * 
 */
class FeedController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $logged_user = auth()->user();
        $followingIDs = $logged_user->following()->pluck('user_id'); //pluck() - get the specified column's data in a table

        $result = TwitterCloneModel::whereIn('user_id', $followingIDs)->latest();

        if (request()->has('search_tweet')) {
            $result = $result->where('content', 'like', '%' . request()->get('search_tweet') . '%');
        }

        return view('dashboard.dashboard', [
            'twitter_content_details' => $result->paginate(5)
        ]);
    }
}
