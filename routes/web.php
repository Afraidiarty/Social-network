<?php

use Illuminate\Support\Facades\Route;


# Route

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/inbox', function () {
    return view('inbox');
})->name('inbox');

Route::get('/members', function () {
    return view('members');
})->name('members');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

#get 

Route::get('/main', 'MainController@index')->name('main');
Route::get('/members', 'MembersController@index')->name('members');

Route::get('/profile/{id}', 'ProfileController@index')->name('profile');




# post
Route::post('/image/upload' , 'ImageController@upload')->name('image.upload');

Route::post('/welcome/submit', 'RegistrationController@Registration')->name('reg-form');
Route::post('/login/submit', 'LoginController@login')->name('log-form');

Route::post('/main/CreatePost.php', 'PostController@CreatePost')->name('CreatePost');

Route::post('inbox/SendMessages/{id_user}', 'InboxController@send')->name('SendMessages');
Route::get('inbox', 'InboxController@ShowAllMessages')->name('inbox');
//Route::get('inbox', 'InboxController@ShowAllReceivedMessages')->name('inbox');
Route::get('/get-messages/{userId}', 'InboxController@getMessages')->name('get-messages');

