<?php
/**
 * Custom route file which contains routes only for auth
 * 
 * Eg: If Admin route has more than 50 routes it will be hard to read, for that purpose we can create our own route files
 * 
 */
use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;

Route::get('/register', [AuthController::class, 'register'])->name('register');

Route::post('/register', [AuthController::class, 'store']);

Route::get('/login', [AuthController::class, 'login'])->name('login');

Route::post('/login', [AuthController::class, 'authenticate']);

Route::post('/logout', [AuthController::class, 'logout'])->name('logout');