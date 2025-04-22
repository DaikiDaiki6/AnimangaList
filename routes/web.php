<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageViewController;
use App\Http\Controllers\SessionUserController;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', function () { // landing page
    return view('auth.login');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');; //create acc view
    Route::post('/register', [RegisteredUserController::class, 'store'])->name('register.post'); // create acc

    Route::get('/login', [SessionUserController::class, 'create'])->name('login'); //login acc view
    Route::post('/login', [SessionUserController::class, 'store']); //login acc
});

Route::middleware('auth')->group(function () {
    Route::get('/user/edit', [SessionUserController::class, 'edit']); //edit acc view
    Route::post('/user/edit', [SessionUserController::class, 'update']);  //edit acc
    Route::get('/profile', [SessionUserController::class, 'show']); // profile acc view
    Route::get('/logout', [SessionUserController::class, 'destroy']);
    Route::get('/home', [PageViewController::class, 'home']); // home page
    Route::get('/filter/anime', [PageViewController::class, 'anime']); // anime page
    Route::get('/filter/manga', [PageViewController::class, 'manga']); // manga page

    Route::get('/profile/{id}', [PageViewController::class, 'other_profile']);
    Route::get('/animanga/{id}', [PageViewController::class, 'animangalist']);
    Route::get('/create/animanga', [PageViewController::class, 'create_view']);
    Route::post('/create/animanga', [PageViewController::class, 'create_animanga']);

    Route::get('/people', [PageViewController::class, 'people']);
    Route::get('/like/animanga/{id}', [PageViewController::class, 'like']);
});
