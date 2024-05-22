<?php

use App\Http\Controllers\Admin\AdminDashController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FeedController;
use App\Http\Controllers\FollowerController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TweetLikeController;
use App\Http\Controllers\TwitterCommentsController;
use App\Http\Controllers\TwitterController;
use App\Http\Controllers\UserController;
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

// Route::get('/users', [UsersController::class, 'manage_users']); //This indicates go to DashboardController and look for 'manage_users' function.

Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');

Route::get('/terms', [DashboardController::class, 'terms']);

Route::group(['prefix' => 'tweet/', 'as' => 'tweet.', 'middleware' => 'auth'], function () { //'as' - prefix for route name
    Route::post('create', [TwitterController::class, 'create_tweet'])->name('create'); // naming routes

    Route::delete('delete/{id}', [TwitterController::class, 'delete_tweet'])->name('delete'); // passing values in routes

    Route::get('{id}', [TwitterController::class, 'show_tweet'])->name('show')->withoutMiddleware('auth');

    Route::get('{id}/edit', [TwitterController::class, 'edit_tweet'])->name('edit');

    Route::put('update/{id}', [TwitterController::class, 'update_tweet'])->name('update');

    Route::get('{tweet_id}/comments', [TwitterCommentsController::class, 'tweet_comments'])->name('comments.show')->withoutMiddleware(['auth']); //withoutMiddleware means this route alone doesn't have auth middleware mentioned.

    Route::post('{tweet_id}/comments/store', [TwitterCommentsController::class, 'create_tweet_comments'])->name('comments.store');
});

/**
 * Resource route
 * 
 * To implement resource route we should use the same syntax format like laravel documentation used
 * 
 * only()- function will create only the routes for the mentioned method names
 * except() - function will wont include route for the mention method names
 *  
 */
Route::resource('profile', ProfileController::class)->only('show');
Route::resource('profile', ProfileController::class)->only('edit', 'update')->middleware('auth');

Route::get('my-profile', [ProfileController::class, 'my_account'])->middleware('auth')->name('my-profile');

Route::post('users/{user_id}/follow', [FollowerController::class, 'follow'])->middleware('auth')->name('users.follow');

Route::post('users/{user_id}/un-follow', [FollowerController::class, 'un_follow'])->middleware('auth')->name('users.un-follow');

Route::post('tweet/{tweet_id}/like', [TweetLikeController::class, 'like'])->middleware('auth')->name('tweet.like');

Route::post('tweet/{tweet_id}/unlike', [TweetLikeController::class, 'unlike'])->middleware('auth')->name('tweet.unlike');

/**
 * To create invokable controller
 * 
 * php artisan make:controller FeedController --invokable
 */
Route::get('/feed', FeedController::class)->name('feed')->middleware('auth'); //It is an invokable controller

//can is a middleware helper used to call gates. Here we are calling a gate name 'admin'
Route::get('/admin', [AdminDashController::class, 'index'])->middleware(['auth', 'can:admin'])->name('admin.dashboard');