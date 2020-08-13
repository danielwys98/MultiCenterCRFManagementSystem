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

Route::post('mhistory/{id}','MH_Controller@storeMH')->name('store.mhistory');

Route::put('mhistory/{mhistory}','MH_Controller@updateMH')->name('update.mhistory');

Route::post('pexam/{id}','PE_Controller@storePE')->name('store.pexam');

Route::put('pexam/{pexam}','PE_Controller@updatePE')->name('update.pexam');

Route::post('urinetest/{id}','UT_Controller@storeUT')->name('store.urinetest');

Route::put('urinetest/{urinetest}','UT_Controller@updateUT')->name('update.urinetest');

Route::post('iecriteria/{id}','IEC_Controller@storeIEC')->name('store.iecriteria');

Route::put('iecriteria/{iecriteria}','IEC_Controller@updateIEC')->name('update.iecriteria');

Route::post('conclusion/{id}','CS_Controller@storeCS')->name('store.conclusion');

Route::put('conclusion/{conclusion}','CS_Controller@updateCS')->name('update.conclusion');

Route::post('serology/{id}','ST_Controller@storeST')->name('store.serology');

Route::put('serology/{serology}','ST_Controller@updateST')->name('update.serology');

/*Route::delete('details/{details}','BMVS_Controller@delete')->name('details.delete');*/

Auth::routes();



Route::resource('users','Admin\UsersController',['except'=>['show','create','store']]);

Route::resource('preScreening','preScreeningController');
