<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/submit', 'UserController@sign')->name('sign');

Route::get('/profile', 'ProfileController@me')->name('profile')->middleware('token');

Route::get('/profile/{id}', 'ProfileController@stranger')->name('strange-profile');
