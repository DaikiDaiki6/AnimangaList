<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Animangalist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PageViewController extends Controller
{
    public function home()
    {
        $animanga = Animangalist::all();
        // dd($animanga);
        return view('page.index', ['animanga' => $animanga]);
    }

    public function anime()
    {
        $animanga = Animangalist::where('type', 'Anime')->get();

        foreach ($animanga as $item) {
            $item->cover_image = '/' . str_replace('\\', '/', $item->cover_image);
        }

        return view('page.filter', ['type' => 'anime', 'animanga' => $animanga]);
    }

    public function manga()
    {
        $animanga = Animangalist::where('type', 'Manga')->get();

        foreach ($animanga as $item) {
            $item->cover_image = '/' . str_replace('\\', '/', $item->cover_image);
        }

        return view('page.filter', ['type' => 'manga', 'animanga' => $animanga]);
    }

    public function other_profile(string $id)
    {
        $users = User::findorFail($id);
        // dd($users);
        return view('page.other_profile', ['users' => $users]);
    }

    public function animangalist(string $id)
    {
        $animanga = Animangalist::findorFail($id);
        // dd($animanga);
        return view('page.animangalist', ['animanga' => $animanga]);
    }

    public function create_view()
    {
        return view('page.create_animanga');
    }

    public function create_animanga(Request $request)
    {
        // validate
        $attributes = $request->validate([
            'title' => ['required'],
            'studio' => ['required'],
            'ep_count' => ['required', 'integer'],
            'synopsis' => ['required'],
            'type' => ['required', 'in:Anime,Manga'],
            'cover_image' => ['nullable', 'image', 'mimes:jpg,jpeg,png', 'max:2048'] // I have default path if no image
        ]);
        // handle image file upload
        if ($request->hasFile('cover_image')) {
            $attributes['cover_image'] = 'storage/' . $request->file('cover_image')->store('Test Pics', 'public');
        }

        // create animanga
        Animangalist::create($attributes);
        // redirect
        return redirect('/home')->with('success', 'Animanga successfully created!');
    }

    public function people()
    {
        $users = User::where('id', '!=', Auth::id())->withCount('animangalists')->get();
        // dd($users);
        return view('page.people', ['users' => $users]);
    }
}
