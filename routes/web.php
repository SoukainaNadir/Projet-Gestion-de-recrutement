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
Route::post('/add/offer','FindjobController@store' )->name('offer.store');

Route::get('/edit/offer/{slug}', 'FindjobController@edit')->name('offer.edit');
Route::put('/update/offer/{slug}', 'FindjobController@update')->name('offer.update');
Route::delete('/delete/offer/{slug}', 'FindjobController@delete')->name('offer.delete');
Route::get('/AdduploadCV', function () {
    return view('AdduploadCV');
})->name('AdduploadCV');


Route::get('/showCv','addCvController@index')->name('cv.show');
Route::get('/successCv', function () {
    return view('successCv');
})->name('successCv');
Route::get('/create/cv', 'addCvController@create')->name('cv.create');
Route::post('/add/cv', 'addCvController@store')->name('cv.store');
Route::get('/cvs/{cv}/edit', 'addCvController@edit')->name('cv.editCv');
Route::put('/cvs/{cv}', 'addCvController@update')->name('cv.updateCv');
Route::delete('/cvs/{cv}', 'addCvController@delete')->name('cv.delete');

//routes for PDF
Route::get('/pdf/export', 'PDFController@pdfGenerator')->name('pdf.generator');
Route::get('/CL/export', 'CLController@pdfGenerator')->name('CL.generator');


Route::get('/showCL','CoverletterController@index')->name('coverletters.show');
Route::get('/coverletters/create', 'CoverletterController@create')->name('coverletters.create');
Route::post('/coverletters', 'CoverletterController@store')->name('coverletters.store');
Route::get('/coverletters/{coverletter}/edit', 'CoverletterController@edit')->name('coverletters.edit');
Route::put('/coverletters/{coverletter}', 'CoverletterController@update')->name('coverletters.update');
Route::delete('/coverletters/{coverletter}', 'CoverletterController@delete')->name('coverletters.delete');
//manage offers
Route::get('/profile/manageOffers','FindjobController@manageOffers')->name('manageOffers');
//routes for Apply for job
Route::post('/apply/job/save','FindjobController@applyJobSave')->name('job.save');

//route for applicants
Route::get('/job/applicants/{title}','FindjobController@jobApplicants')->name('jobApplication');
//route for downoald the file
Route::get('/Cv/download/{id}','FindjobController@downloadCv')->name('downloadCv');
Route::get('/Cl/download/{id}','FindjobController@downloadCl')->name('downloadCl');

//search
Route::get('/search','FindjobController@search')->name('search');


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('home');
    })->name('home');
});



Route::get('/upload', function () {
    return view('choice');
})->name('upload');
