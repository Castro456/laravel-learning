<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function register()
    {
        return view('auth.register');
    }

    public function store()
    {
        // dd(request()->all());
        $validate = request()->validate([
            'name' => 'required|min:5|max:40',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed' //confirmed will check the confirm password field only if that html name is 'password_confirmation'
        ]);

        
        User::create([
            'name' => $validate['name'],
            'email' => $validate['email'],
            'password' => Hash::make($validate['password'])
        ]);

        return redirect()->route('dashboard')->with('success', 'Account created successfully');
    }
}
