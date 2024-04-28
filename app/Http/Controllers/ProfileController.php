<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    /**
     * If we use php artisan make:controller UserController -r
     * 
     * This will create the following methods automatically:
     * 1. index
     * 2. create
     * 3. store
     * 4. show
     * 5. edit
     * 6. update
     * 7. destroy
     * 
     * I have removed the unwanted methods created by the laravel
     */

    /**
     * Display the specified resource.
     */
    public function show(User $profile)
    {
        // $data = [
        //     'profile' => $profile
        // ];
        // dd($data['profile']['name']);

        // The above code [data] can be written as compact('profile')
        // In order to use compact both array key, input value should be same

        $twitter_content_details = $profile->tweets()->paginate(5);

        return view('users.profile.profile_show', compact('profile', 'twitter_content_details'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $profile)
    {
        $profile_editing = true; //Allowing to edit in the same show page
        $twitter_content_details = $profile->tweets()->paginate(5);

        return view('users.profile.profile_edit', compact('profile', 'profile_editing', 'twitter_content_details'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $profile)
    {
        return view('users.profile.profile_update', compact('profile'));
    }


    public function my_account() 
    {
        //auth()->user() will be worked in using a model
        return $this->show(auth()->user());
    }

}
