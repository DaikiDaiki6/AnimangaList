<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageViewController extends Controller
{
    public function home()
    {
        return view('index');
    }

    public function anime()
    {
        return view('filter', ['type' => 'anime']);
    }

    public function manga()
    {
        return view('filter', ['type' => 'manga']);
    }
}
