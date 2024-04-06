<?php

use App\Http\Controllers\DashboardController;
use App\Http\Controllers\TwitterController;
use App\Http\Controllers\UsersController;
use Illuminate\Support\Facades\Route;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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

Route::get('/users', [UsersController::class, 'manage_users']); //This indicates go to DashboardController and look for 'manage_users' function.

Route::get('/dashboard', [DashboardController::class, 'dashboard']);

Route::get('/terms', [DashboardController::class, 'terms']);

Route::post('/create-tweet', [TwitterController::class, 'create_tweet'])->name('create.tweet'); // naming routes

Route::delete('/delete-tweet/{id}', [TwitterController::class, 'delete_tweet'])->name('delete.tweet'); // passing values in routes

Route::get('/show-tweet/{id}', [TwitterController::class, 'show_tweet'])->name('show.tweet');

