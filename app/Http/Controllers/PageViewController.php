<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Animangalist;
use Illuminate\Http\Request;

class PageViewController extends Controller
{
    public function home()
    {
        $animanga = Animangalist::all();
        return view('page.index', ['animanga' => $animanga]);
    }

    public function anime()
    {
        $animanga = Animangalist::where('type', 'Anime')->get();
        return view('page.filter', ['type' => 'anime', 'animanga' => $animanga]);
    }

    public function manga()
    {
        $animanga = Animangalist::where('type', 'Manga')->get();
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
}
