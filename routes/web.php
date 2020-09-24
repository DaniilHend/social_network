<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'UserController@form')->name('form');

Route::post('/submit', 'UserController@sign')->name('sign');

Route::post('/comment', 'ProfileController@comment')->name('comment');

Route::any('/profile', 'ProfileController@me')->name('profile')->middleware('token');

Route::get('/profile/all', 'ProfileController@all')->name('profiles');

Route::get('/profile/{id}', 'ProfileController@stranger')->name('strange-profile');


