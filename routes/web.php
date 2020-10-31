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

Route::get('/dashboard', 'PagesController@index')->name('dashboard');

/*Route::get('/preScreening', 'PagesController@preScreening');*/

Route::get('/studySpecific/admin', 'studySpecificController@index');

Route::get('/preScreening/admin','preScreeningController@index')->name('preScreening.admin');

Route::get('/preScreening/admin/search','preScreeningController@search');

Route::get('/chooseStudy','PagesController@chooseStudy');

/*Route::get('/studySpecific/input','studySpecificController@studies');*/

Route::get('/studySpecific/index','studySpecificController@index');

Route::get('/studySpecific/input/{id}','studySpecificController@studies')->name('studySpecific.input');

Route::post('sp_admission/{id}','SP1_Admission_Controller@store')->name('sp1Admission.store');

Route::post('sp_bmvs/{id}','SP1BMVSController@store')->name('sp1bmvs.store');

Route::post('sp_bat/{id}','SP1BATController@store')->name('sp1bat.store');

Route::post('sp_pdynamicsampling/{id}','SP1PDynamicSamplingController@store')->name('sp1pdynamicsampling.store');

//route for testing
Route::post('testing/{id}','studySpecificController@testingPost')->name('testing.store');

/*Route::get('/testing/{id}','studySpecificController@testing');*/
//route for testing ends here

/*Route::get('/studySpecificdb/create','studySpecificController@create');

Route::get('/studySpecificdb/test','studySpecificController@testing');*/

/*Route::get('/preScreeningForm','PagesController@preScreeningForm');*/

/*Route::put('studySpecific/edit/{id}','studySpecificController@update')->name('studySpecific.update');*/

Route::get('preScreeningForms/create/{id}','BMVS_Controller@create')->name('preScreeningForms.create');

Route::post('preScreeningForms/{id}','BMVS_Controller@store')->name('preScreeningForms.store');

Route::get('preScreeningForms/show/{id}','BMVS_Controller@show')->name('preScreeningForms.show');

Route::get('preScreeningForms/edit/{id}','BMVS_Controller@edit')->name('preScreeningForms.edit');

Route::put('preScreeningForms/{preScreeningForms}','BMVS_Controller@update')->name('preScreeningForms.update');

Route::post('bater/{id}','BATER_Controller@storeBATER')->name('store.bater');

Route::put('bater/{bater}','BATER_Controller@updateBATER')->name('update.bater');

Route::post('mhistory/{id}','MH_Controller@storeMH')->name('store.mhistory');

Route::put('mhistory/{mhistory}','MH_Controller@updateMH')->name('update.mhistory');

Route::post('pexam/{id}','PE_Controller@storePE')->name('store.pexam');

Route::put('pexam/{pexam}','PE_Controller@updatePE')->name('update.pexam');

Route::post('urinetest/{id}','UT_Controller@storeUT')->name('store.urinetest');

Route::put('urinetest/{urinetest}','UT_Controller@updateUT')->name('update.urinetest');

Route::post('labtest/{id}','Lab_Controller@storeLT')->name('store.labtest');

Route::put('labtest/{labtest}','Lab_Controller@updateLT')->name('update.labtest');

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

Route::resource('studySpecific','studySpecificController');
