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

Route::get('/studySpecific', 'PagesController@studySpecific');

Route::get('/preScreening/admin','preScreeningController@admin');

Route::get('/studySpecificdb','PagesController@studySpecificdb');

Route::get('/preScreeningForm','PagesController@preScreeningForm');

Route::get('details/create/{id}','BMVS_Controller@create')->name('details.create');

Route::post('details/{id}','BMVS_Controller@store')->name('details.store');

Route::get('details/show/{id}','BMVS_Controller@show')->name('details.show');

Route::get('details/edit/{id}','BMVS_Controller@edit')->name('details.edit');

Route::put('details/{details}','BMVS_Controller@update')->name('details.update');

Route::post('bater/{id}','BATER_Controller@storeBATER')->name('store.bater');

Route::put('bater/{bater}','BATER_Controller@updateBATER')->name('update.bater');


/*Route::delete('details/{details}','BMVS_Controller@delete')->name('details.delete');*/

Auth::routes();


Route::resource('users','Admin\UsersController',['except'=>['show','create','store']]);

Route::resource('preScreening','preScreeningController');
