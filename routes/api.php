<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Hash;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


// create a user
Route::get('/user/create', function (Request $request) {
    \App\Models\User::create([
        'first_name' => 'Vladimir',
        'last_name' => 'Pejic',
        'email' => 'vladimir.pejic@gmail.com',
        'password' => Hash::make('Vladimir123'),
    ]);
});

// login a user
Route::post('login', function () {
    $credentials = request()->only(['email', 'password']);
    return auth()->attempt($credentials);
});

// get authenticated user
Route::middleware('auth')->get('/user', function() {
    return auth()->user();
});

// logout a user
