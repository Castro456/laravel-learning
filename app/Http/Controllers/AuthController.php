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

    public function login()
    {
        return view('auth.login');
    }

    public function authenticate()
    {
        $validate = request()->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        if(auth()->attempt($validate)) { //auth() is laravel built-in fn. It will line will automatically checks the db using provided creds and authenticate the user.
            request()->session()->regenerate();

            return redirect()->route('dashboard')->with('success', 'Logged in successfully');
        }
        else {
            return redirect()->route('login')->withErrors([
                'email' => 'Email or password is incorrect'
            ]);
        }
    }

    public function logout()
    {
        auth()->logout();

        request()->session()->invalidate();//clear sessions
        request()->session()->regenerateToken();

        return redirect()->route('dashboard')->with('success', 'Logged out successfully');
    }
}