<?php

use Illuminate\Support\Facades\Route;

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

Route::middleware('auth')
    ->namespace('Admin')
    ->name('admin.')
    ->prefix('admin')
    ->group(function (){
        //admin
        Route::get('/', 'HomeController@index')->name('home');

        Route::resource('posts', 'PostController');
        Route::resource('tag', 'TagController');

        Route::get('user', 'UserController@edit')->name('user.edit');
        Route::put('user', 'UserController@update')->name('user.update');

        Route::get('user/getMyAvatar', 'UserController@getMyAvatar')->name('user.getMyAvatar');
    });
    
// da mettere sempre alla fine dela lista
Route::get("{any?}", function(){
    return view ("guests.home");
})->where("any", ".*");

