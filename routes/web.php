<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| This file is where you may define all of the routes that are handled
| by your application. Just tell Laravel the URIs it should respond
| to using a Closure or controller method. Build something great!
|
*/

use App\Banner;
use Illuminate\Http\Request;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/banners', 'BannersController@index')->name('banners.index');
Route::get('/banners/details/{id}', 'BannersController@details')->name('banners.details');
Route::get('/banners/add', 'BannersController@add')->name('banners.add');
Route::post('/banners/insert', 'BannersController@insert')->name('banners.insert');
Route::get('/banners/edit/{id}', 'BannersController@edit')->name('banners.edit');
Route::post('/banners/update/{id}', 'BannersController@update')->name('banners.update');
Route::get('/banners/delete/{id}', 'BannersController@delete')->name('banners.delete');
