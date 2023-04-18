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
Route::get('/Findjob', 'FindjobController@index')->name('offers');
Route::get('/offer/{id}', 'FindjobController@show')->name('offer.show');
Route::get('/create/offer', 'HomeController@create')->name('offer.create');
Route::post('/add/offer', 'FindjobController@store')->name('offer.store');
Route::get('/edit/offer/{slug}', 'FindjobController@edit')->name('offer.edit');
Route::put('/update/offer/{slug}', 'FindjobController@update')->name('offer.update');
Route::delete('/delete/offer/{slug}', 'FindjobController@delete')->name('offer.delete');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
