<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rules\Password;

class RegisteredUserController extends Controller
{

    public function create()
    {
        return view('register');
    }


    public function store(Request $request)
    {
        //validate
        $attributes = $request->validate([
            'name' => ['required'],
            'email' => ['email', 'required'],
            'password' => ['confirmed', 'required', Password::min(6)],
        ]);
        //create user
        $user = User::create($attributes);
        //login
        Auth::login($user);
        //redirect
        return redirect('/home');
    }
}
