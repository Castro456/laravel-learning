<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class FollowerController extends Controller
{
    public function follow(User $user_id) //Route model binding
    {
        $follower = auth()->user();

        // @phpcs:disable
        $follower->following()->attach($user_id); //attach() - added new record

        return redirect()->route('profile.show', $user_id)->with('success', 'You started following this user');
    }

    public function un_follow(User $user_id)
    {
        $follower = auth()->user();

        $follower->following()->detach($user_id); //detach() remove a record from db

        return redirect()->route('profile.show', $user_id)->with('success', 'You stopped following this user');
    }
}
