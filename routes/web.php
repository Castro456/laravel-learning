<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome'); //loads from resources/view/welcome.blade.php (not need to mention .blade)
});

Route::get('/html', function () {
    return "<h1> Hello Laravel </h1>"; //can also give html tags, but not recommended
});

Route::get('/feed', function () {
    return view('rss.feed'); //rss.feed indicates that feed file is inside the rss folder
});
