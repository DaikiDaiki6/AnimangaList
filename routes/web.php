<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageViewController;
use App\Http\Controllers\SessionUserController;
use App\Http\Controllers\RegisteredUserController;

Route::get('/', function () { // landing page
    return view('login');
});

Route::middleware('guest')->group(function () {
    Route::get('/register', [RegisteredUserController::class, 'create'])->name('register');; //create acc view
    Route::post('/register', [RegisteredUserController::class, 'store']); // create acc

    Route::get('/login', [SessionUserController::class, 'create'])->name('login'); //login acc view
    Route::post('/login', [SessionUserController::class, 'store']); //login acc
});

Route::middleware('auth')->group(function () {
    Route::get('/user/edit', [SessionUserController::class, 'edit']); //edit acc view
    Route::post('/user/edit', [SessionUserController::class, 'update']);  //edit acc
    // do this later Route::post('/user/{id}/edit', [SessionUserController::class, 'update']);  //edit acc
    Route::get('/profile', [SessionUserController::class, 'show']); // profile acc view
    // do this later Route::get('/{id}/profile', [SessionUserController::class, 'show']); // profile acc view
    Route::get('/logout', [SessionUserController::class, 'destroy']);
    Route::get('/home', [PageViewController::class, 'home']); // home page
    Route::get('/filter/anime', [PageViewController::class, 'anime']); // anime page
    Route::get('/filter/manga', [PageViewController::class, 'manga']); // manga page
});
