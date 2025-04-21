<?php

namespace App\Http\Controllers;

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
}
