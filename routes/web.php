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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/restaurant-registration', 'RestaurantRegistrationController@form');
Route::post('/restaurant-registration', 'RestaurantRegistrationController@register');

Route::get('/restaurants', 'RestaurantController@index');
Route::get('/restaurants/{id}', 'RestaurantController@show');

Route::get('/reviews/{id}/edit', 'ReviewController@edit');
Route::post('/reviews/{id}/edit', 'ReviewController@update');
Route::post('/reviews/{id}/store', 'ReviewController@store');

Route::get('/comment-reply/{id}/reply', 'CommentReplyController@reply');
Route::post('/comment-reply/{id}/store', 'CommentReplyController@store');



Route::get('/home', 'HomeController@index')->name('home');
