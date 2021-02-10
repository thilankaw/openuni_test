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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('/application/job/{id}', 'ApplicantController@index');
Route::post('/application/create', 'ApplicantController@store')->name('application.create');
Route::post('/view/{id}', 'ApplicantController@view');
Route::post('/application/create', 'ApplicantController@store')->name('application.create');
Route::post('/applicant/edit/{id}', 'ApplicantController@edit')->name('application.edit');
Route::post('/application/update', 'ApplicantController@update')->name('application.update');
Route::post('/application/delete/{id}', 'ApplicantController@delete')->name('application.delete');
