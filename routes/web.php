<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'UserController@form')->name('form');

Route::post('/submit', 'UserController@sign')->name('sign');

Route::post('/comment/add', 'ProfileController@createComment')->name('createComment')->middleware('auth');

Route::post('/comment/delete', 'ProfileController@deleteComment')->name('deleteComment')->middleware('auth');

Route::get('/comments', 'ProfileController@allComments')->name('comments')->middleware('auth');

Route::get('/profile', 'ProfileController@myProfile')->name('profile')->middleware('auth');

Route::get('/profiles', 'ProfileController@allUsers')->name('profiles');

Route::get('/profile/{id}', 'ProfileController@profile')->name('other-profile');

Route::post('/ajax/comments', 'ProfileController@comments');

Route::post('/ajax/library', 'BooksController@getLibrary')->middleware('auth');

Route::get('/exit', 'ProfileController@profileExit')->middleware('auth');

Route::get('/library', 'BooksController@library')->name('library')->middleware('auth');

Route::post('/book/add', 'BooksController@createBook')->name('createBook')->middleware('auth');

Route::post('/book/update', 'BooksController@updateBook')->name('updateBook')->middleware('auth');

Route::post('/book/delete', 'BooksController@deleteBook')->name('deleteBook')->middleware('auth');

Route::get('/book/edit/{id}', 'BooksController@editBook')->name('editBook')->middleware('auth');

Route::get('/book/{id}', 'BooksController@readBook')->name('book')->middleware('AccessBooks');

Route::get('/book/share/{id}', 'BooksController@shareBook')->name('shareBook')->middleware('auth');
