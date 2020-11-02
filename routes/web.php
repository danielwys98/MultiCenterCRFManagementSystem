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

//Testing route
Route::get('/testing','studySpecificController@testing')->name('testing');

Route::post('/testing/{id}','studySpecificController@testPost')->name('testPost');
//Testing route ends here

Route::get('/','PagesController@loginPage');

Route::get('/dashboard', 'PagesController@index')->name('dashboard');

/*Route::get('/preScreening', 'PagesController@preScreening');*/

Route::get('/studySpecific/admin', 'studySpecificController@index');

Route::get('/preScreening/admin','preScreeningController@index')->name('preScreening.admin');

Route::get('/preScreening/admin/search','preScreeningController@search');

Route::get('/chooseStudy','PagesController@chooseStudy');

/*Route::get('/studySpecific/input','studySpecificController@studies');*/
Route::get('/studySpecific/admin','studySpecificController@index')->name('studySpecific.admin');

Route::get('/studySpecific/index','studySpecificController@index');

Route::get('/studySpecific/input/{id}','studySpecificController@studies')->name('studySpecific.input');

//study specific Admission
Route::post('sp_admission/{id}','SP1_Admission_Controller@store')->name('sp1Admission.store');
Route::put('sp_admisison/{patient_id}/update/{study_id}','SP1_Admission_Controller@update')->name('sp1Admission.update');
//study specific Body Measurements and Vital Signs
Route::post('sp_bmvs/{id}','SP1_BMVS_Controller@store')->name('sp1bmvs.store');
Route::post('sp_bmvs/{patient_id}/update/{study_id}','SP1_BMVS_Controller@update')->name('sp1bmvs.update');
//study specific Breath Alcohol Test
Route::post('sp_bat/{id}','SP1_BAT_Controller@store')->name('sp1bat.store');
Route::post('sp_bat/{patient_id}/update/{study_id}','SP1_BAT_Controller@update')->name('sp1bat.update');
//study specific Admission Questionnaire

//study specific Urine Pregnancy Test
Route::post('sp_urinetest/{id}','SP1_UrineTest_Controller@store')->name('spUrineTest.store');
Route::post('sp_urinetest/{patient_id}/update/{study_id}','SP1_UrineTest_Controller@update')->name('spUrineTest.update');
//study specific Pharmacokinetic Blood Sampling
Route::post('sp_pharmocokinetic/{id}','SP1_PKineticSampling_Controller@store')->name('spPharmocokinetic.store');
Route::post('sp_pharmocokinetic/{patient_id}/update/{study_id}','SP1_PKineticSampling_Controller@update')->name('spPharmocokinetic.update');
//study specific Pharmacodynamic Blood Sampling
Route::post('sp_pdynamicsampling/{id}','SP1_PDynamicSampling_Controller@store')->name('sppdynamicsampling.store');
Route::post('sp_pdynamicsampling/{patient_id}/update/{study_id}','SP1_PDynamicSampling_Controller@update')->name('sppdynamicsampling.update');
//study specific Pharmacodynamic (PD) Analysis

//study specific Vital Signs

//study specific Discharge

//study specific Discharge Questionnaire

//study specific Interim Questionnaire(36 hours Post Dose Visit)
Route::post('sp_iq36/{id}','SP1_IQ36_Controller@store')->name('spIQuestionnaire36.store');
Route::post('sp_iq36/{patient_id}/update/{study_id}','SP1_IQ36_Controller@update')->name('spIQuestionnaire36.update');
//study specific Interim Questionnaire(48 hours Post Dose Visit)
Route::post('sp_iq48/{id}','SP1_IQ48_Controller@store')->name('spIQuestionnaire48.store');
Route::post('sp_iq48/{patient_id}/update/{study_id}','SP1_IQ48_Controller@update')->name('spIQuestionnaire48.update');


//this is to edit the studies detail and the subject study details
Route::post('/studySpecific/details/edit/{id}','SP1_Admission_Controller@edit')->name('SubjectStudySpecific.edit');


/*Route::get('/studySpecificdb/create','studySpecificController@create');

Route::get('/studySpecificdb/test','studySpecificController@testing');*/

/*Route::get('/preScreeningForm','PagesController@preScreeningForm');*/

/*Route::put('studySpecific/edit/{id}','studySpecificController@update')->name('studySpecific.update');*/

//pre screening routes
//bmvs
Route::get('preScreeningForms/create/{id}','BMVS_Controller@create')->name('preScreeningForms.create');
Route::post('preScreeningForms/{id}','BMVS_Controller@store')->name('preScreeningForms.store');
Route::get('preScreeningForms/show/{id}','BMVS_Controller@show')->name('preScreeningForms.show');
Route::get('preScreeningForms/edit/{id}','BMVS_Controller@edit')->name('preScreeningForms.edit');
Route::put('preScreeningForms/{preScreeningForms}','BMVS_Controller@update')->name('preScreeningForms.update');
//bater
Route::post('bater/{id}','BATER_Controller@storeBATER')->name('store.bater');
Route::put('bater/{bater}','BATER_Controller@updateBATER')->name('update.bater');
//medical history
Route::post('mhistory/{id}','MH_Controller@storeMH')->name('store.mhistory');
Route::put('mhistory/{mhistory}','MH_Controller@updateMH')->name('update.mhistory');
//physical exam
Route::post('pexam/{id}','PE_Controller@storePE')->name('store.pexam');
Route::put('pexam/{pexam}','PE_Controller@updatePE')->name('update.pexam');
//urine test
Route::post('urinetest/{id}','UT_Controller@storeUT')->name('store.urinetest');
Route::put('urinetest/{urinetest}','UT_Controller@updateUT')->name('update.urinetest');
//lab test
Route::post('labtest/{id}','Lab_Controller@storeLT')->name('store.labtest');
Route::put('labtest/{labtest}','Lab_Controller@updateLT')->name('update.labtest');
//serology test
Route::post('serology/{id}','ST_Controller@storeST')->name('store.serology');
Route::put('serology/{serology}','ST_Controller@updateST')->name('update.serology');
//inclusion and exclusion criteria
Route::post('iecriteria/{id}','IEC_Controller@storeIEC')->name('store.iecriteria');
Route::put('iecriteria/{iecriteria}','IEC_Controller@updateIEC')->name('update.iecriteria');
//conclusion
Route::post('conclusion/{id}','CS_Controller@storeCS')->name('store.conclusion');
Route::put('conclusion/{conclusion}','CS_Controller@updateCS')->name('update.conclusion');

/*Route::delete('details/{details}','BMVS_Controller@delete')->name('details.delete');*/

//<<<<TCH
Route::post('sp1_PDAnalysis/{id}','SP1_PDynamicAnalysis_Controller@store')->name('sp1PDAnalysis.store');

Route::post('sp1_AQuestionnaire/{id}','SP1_AQuestionnaire_Controller@store')->name('sp1_AQuestionnaire.store');

Route::post('sp1_Discharge/{id}','SP1_Discharge_Controller@store')->name('sp1_Discharge.store');

Route::post('SP1_DQuestionnaire/{id}','SP1_DQuestionnaire_Controller@store')->name('sp1_DQuestionnaire.store');

Route::post('SP1_VitalSign/{id}','SP1_VitalSign_Controller@store')->name('sp1_VitalSign.store');

Route::put('SP1_VitalSign/{patient_id}/update/{study_id}','SP1_VitalSign_Controller@update')->name('sp1_VitalSign.update');
//>>>>End
Auth::routes();

Route::resource('users','Admin\UsersController',['except'=>['show','create','store']]);

Route::resource('preScreening','preScreeningController');

Route::resource('studySpecific','studySpecificController');
