<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class UserController extends Controller
{
    //

    public function showGuestView(User $user): View
    {
        $blogs = $user->blogs;

        return view('users.guest', ['user' => $user, 'blogs' => $blogs]);
    }
}
