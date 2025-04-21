<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    public function update(Request $request, string $id)
    {
        dd('Done', $request->all());
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
