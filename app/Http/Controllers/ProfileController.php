<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Storage;

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
        $this->authorize('update', $profile);

        $profile_editing = true; //Allowing to edit in the same show page
        $twitter_content_details = $profile->tweets()->paginate(5);
        return view('users.profile.profile_edit', compact('profile', 'profile_editing', 'twitter_content_details'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(User $profile)
    {
        $this->authorize('update', $profile);

        $validated = request()->validate([
            'name' => 'required|min:5|max:40',
            'bio' => 'nullable|min:1|max:255',
            'image' => 'image' //allow's all image formats
        ]);

        // dd($validated);

        if(request('image')) { //same as request()->has('image')
            $image_path = request()->file('image')->store('profile', 'public'); //laravel call it as disk, what this line means is use public disk in filesystems.php to store the uploaded file. storage/profile

            //We are doing the following lines because we need to store the user uploaded file in the permanent folder.
            $validated['image'] = $image_path;

            /**
             * ---------------------- Important -------------------
             * 
             * Laravel won't allow the users to access the storage folder directly it allows only the public folder to access
             * 
             * So need to create a link for the storage file using the following command
             * 
             * $ php artisan storage:link
             * 
             * Only after that we can store the files in the storage folder
             * 
             */
            //Clear the previous uploaded image from the storage. But need to improve this code.
            Storage::disk('public')->delete($profile->image ?? '');
        }

        $profile->update($validated);

        return redirect()->route('my-profile')->with('success', "Your profile updated successfully");;
    }


    public function my_account() 
    {
        //auth()->user() will be worked in using a model
        return $this->show(auth()->user());
    }

}
