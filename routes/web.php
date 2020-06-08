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

Route::get('/','PagesController@loginPage');

Route::get('/dashboard', 'PagesController@index');

/*Route::get('/preScreening', 'PagesController@preScreening');*/
Route::get('preScreening/create2',function(){return view('preScreening.create2');});


Route::get('/studySpecific', 'PagesController@studySpecific');

Route::get('/preScreening/admin','preScreeningController@admin');

Route::get('/studySpecificdb','PagesController@studySpecificdb');

Route::get('/preScreeningForm','PagesController@preScreeningForm');

Route::get('Patients_Details/create/{id}','BMVS_Controller@create')->name('Patients_Details.create');

Route::post('Patients_Details/{id}','BMVS_Controller@store')->name('Patients_Details.store');

Route::get('Patients_Details/show/{id}','BMVS_Controller@show')->name('Patients_Details.show');

Route::get('Patients_Details/edit/{id}','BMVS_Controller@edit')->name('Patients_Details.edit');

Route::put('Patients_Details/update/{id}','BMVS_Controller@update')->name('Patients_Details.update');

Auth::routes();

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:adminFunctions')->group(function (){
    Route::resource('users','UsersController',['except'=>['show','create','store']]);
});

Route::resource('preScreening','preScreeningController');
