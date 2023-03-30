<?php

use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', 'HomeController@index');
Route::get('/Findjob', 'FindjobController@index');
Route::get('/offer/{id}', 'FindjobController@show')->name('offer.show');
Route::get('/create/offer', 'HomeController@create')->name('offer.create');
Route::post('/add/offer', 'FindjobController@store')->name('offer.store');