<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::post('/submit', 'UserController@sign')->name('sign');

Route::get('/profile', function () {
    return view('welcome');
})->name('profile');
