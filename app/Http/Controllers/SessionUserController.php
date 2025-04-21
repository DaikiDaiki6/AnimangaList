<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password;
use Illuminate\Validation\ValidationException;

class SessionUserController extends Controller
{

    public function create()
    {
        return view('login');
    }


    public function store(Request $request)
    {
        // validate
        $attributes = $request->validate([
            'email' => ['email', 'required'],
            'password' => ['required'],
        ]);
        //attempt to login
        if (!Auth::attempt($attributes)) {
            throw ValidationException::withMessages([
                'email' => 'Sorry, those credentials do not match...'
            ]);
        }
        // regenerate session
        request()->session()->regenerate();
        // redirect
        return redirect('/home');
    }

    /**
     * Display the specified resource.
     */
    public function show() // add this later string $id)
    {
        return view('profile');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()  // add this later string $id)
    {
        return view('edit');
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request) //, string $id)
    {
        // Find user id
        $user = User::findOrFail(Auth::id());
        // validate
        $attributes = $request->validate([
            'name' => ['min:1', 'nullable'],
            'email' => ['email', 'nullable', Rule::unique('users', 'email')->ignore($user->id)],
            'password' => ['nullable', Password::min(6)],
        ]);
        // edit user
        if (!empty($attributes['name'])) {
            $user->name = $attributes['name'];
        }
        if (!empty($attributes['email'])) {
            $user->email = $attributes['email'];
        }
        if (!empty($attributes['password'])) {
            $user->password = Hash::make($attributes['password']);
        }
        // save
        $user->save();
        // redirect
        return redirect('/home')->with('success', 'Profile updated successfully!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy() //string $id)
    {
        Auth::logout();
        // dd('hehe');
        return redirect('/login');
    }
}
