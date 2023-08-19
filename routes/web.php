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

// Route::get('/', function () {
//     return view('welcome');
// });

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/','UrlController@showform')->name('showform');
Route::any('/gettinyurl','UrlController@getdata')->name('getdata');

Route::middleware(['admin_middleware'])->group(function(){

Route::get('/admin', 'UrlController@adminshow')->name('admin');

});
Route::get('logout', function ()
{
    auth()->logout();
    Session()->flush();
    return Redirect::to('/');})->name('logout');