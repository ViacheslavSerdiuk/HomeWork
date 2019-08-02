<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/', 'PostsController@index');

Route::resource('/posts','PostsController');

Route::group(['prefix'=>'admin','namespace'=>'Admin','middleware'=>'admin'],function() {

    Route::get('/', 'DashboardController@index');
    Route::resource('/users','UsersController');

});
Route::group(['middleware'=>'auth'],function() {
    Route::get('/profile', 'ProfileController@index')->name('profile.index');
    Route::post('/profile', 'ProfileController@store');


});
Route::get('/profile/{id}', 'ProfileController@show')->name('profile.show');

Route::post('/users/{id}/follows','FollowsController@store')->name('users.follow');
Route::delete('/users/{id}/follows','FollowsController@destroy')->name('users.unfollow');
