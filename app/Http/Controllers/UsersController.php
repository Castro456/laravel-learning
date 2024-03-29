<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UsersController extends Controller
{
    public function manage_users()
    {
        $users = [
            [
                'name' => 'Sam',
                'age' => 22
            ],
            [
                'name' => 'Tim',
                'age' => 25
            ]
        ];

        return view(
            'users.users',
            ['users_list' => $users] //passing data to the view
        );
    }
}
