<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'UserController@form')->name('form');

Route::post('/submit', 'UserController@sign')->name('sign');

Route::post('/comment/add', 'ProfileController@createComment')->name('createComment')->middleware('token');

Route::post('/comment/delete', 'ProfileController@deleteComment')->name('deleteComment')->middleware('token');

Route::get('/comments', 'ProfileController@allComments')->name('comments')->middleware('token');

Route::get('/profile', 'ProfileController@myProfile')->name('profile')->middleware('token');

Route::get('/profiles', 'ProfileController@allUsers')->name('profiles');

Route::get('/profile/{id}', 'ProfileController@profile')->name('other-profile');

Route::post('/ajax/comments', 'ProfileController@comments');


