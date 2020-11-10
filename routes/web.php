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


Route::get('/downloadPDF/preScreening/{PID}','PDFController@PreScreeningPDF')->name('preScreening.PDF');

Route::get('/downloadPDF/{id}/{study_id}/{study_period}','PDFController@StudySpecificPDF')->name('test.PDF');
//Testing route ends here

Route::get('/','PagesController@loginPage');

Route::get('/dashboard', 'PagesController@index')->name('dashboard');

/*Route::get('/preScreening', 'PagesController@preScreening');*/

Route::get('/studySpecific/admin', 'studySpecificController@index');

Route::get('/preScreening/admin','preScreeningController@index')->name('preScreening.admin');

Route::get('/preScreening/admin/search','preScreeningController@search');

Route::get('/studySpecific/admin/search','studySpecificController@search');
/*Route::get('/chooseStudy','PagesController@chooseStudy');*/

/*Route::get('/studySpecific/input','studySpecificController@studies');*/
Route::get('/studySpecific/admin','studySpecificController@index')->name('studySpecific.admin');

Route::get('/studySpecific/index','studySpecificController@index');

Route::get('/studySpecific/input/{id}','studySpecificController@studies')->name('studySpecific.input');

//study specific Admission
Route::post('sp_admission/{id}','SP_Admission_Controller@store')->name('sp_Admission.store');
Route::put('sp_admisison/{patient_id}/update/{study_id}/{study_period}','SP_Admission_Controller@update')->name('sp_Admission.update');
//study specific Body Measurements and Vital Signs
Route::post('sp_bmvs/{id}','SP_BMVS_Controller@store')->name('sp_Bmvs.store');
Route::put('sp_bmvs/{patient_id}/update/{study_id}/{study_period}','SP_BMVS_Controller@update')->name('sp_Bmvs.update');
//study specific Breath Alcohol Test
Route::post('sp_bat/{id}','SP_BAT_Controller@store')->name('sp_Bat.store');
Route::put('sp_bat/{patient_id}/update/{study_id}/{study_period}','SP_BAT_Controller@update')->name('sp_Bat.update');
//study specific Admission Questionnaire
Route::post('sp_aquestionnaire/{id}','SP_AQuestionnaire_Controller@store')->name('sp_AQuestionnaire.store');
Route::put('sp_aquestionnaire/{patient_id}/update/{study_id}/{study_period}','SP_AQuestionnaire_Controller@update')->name('sp_AQuestionnaire.update');
//study specific Urine Pregnancy Test
Route::post('sp_urinetest/{id}','SP_UrineTest_Controller@store')->name('sp_UrineTest.store');
Route::put('sp_urinetest/{patient_id}/update/{study_id}/{study_period}','SP_UrineTest_Controller@update')->name('sp_UrineTest.update');
//study specific Pharmacokinetic Blood Sampling
Route::post('sp_pharmocokinetic/{id}','SP_PKineticSampling_Controller@store')->name('sp_Pharmocokinetic.store');
Route::put('sp_pharmocokinetic/{patient_id}/update/{study_id}/{study_period}','SP_PKineticSampling_Controller@update')->name('sp_Pharmocokinetic.update');
//study specific Pharmacodynamic Blood Sampling
Route::post('sp_pdynamicsampling/{id}','SP_PDynamicSampling_Controller@store')->name('sp_Pdynamicsampling.store');
Route::put('sp_pdynamicsampling/{patient_id}/update/{study_id}/{study_period}','SP_PDynamicSampling_Controller@update')->name('sp_Pdynamicsampling.update');
//study specific Pharmacodynamic (PD) Analysis
Route::post('sp_padnalysis/{id}','SP_PDynamicAnalysis_Controller@store')->name('sp_PDAnalysis.store');
Route::put('sp_padnalysis/{patient_id}/update/{study_id}/{study_period}','SP_PDynamicAnalysis_Controller@update')->name('sp_PDAnalysis.update');
//study specific Vital Signs
Route::post('sp_vitalsign/{id}','SP_VitalSign_Controller@store')->name('sp_VitalSign.store');
Route::put('sp_vitalsign/{patient_id}/update/{study_id}/{study_period}','SP_VitalSign_Controller@update')->name('sp_VitalSign.update');
//study specific Discharge
Route::post('sp_discharge/{id}','SP_Discharge_Controller@store')->name('sp_Discharge.store');
Route::put('sp_discharge/{patient_id}/update/{study_id}/{study_period}','SP_Discharge_Controller@update')->name('sp_Discharge.update');
//study specific Discharge Questionnaire
Route::post('sp_dquestionnaire/{id}','SP_DQuestionnaire_Controller@store')->name('sp_DQuestionnaire.store');
Route::put('sp_dquestionnaire/{patient_id}/update/{study_id}/{study_period}','SP_DQuestionnaire_Controller@update')->name('sp_DQuestionnaire.update');
//study specific Interim Questionnaire(36 hours Post Dose Visit)
Route::post('sp_iq36/{id}','SP_IQ36_Controller@store')->name('sp_IQuestionnaire36.store');
Route::put('sp_iq36/{patient_id}/update/{study_id}/{study_period}','SP_IQ36_Controller@update')->name('sp_IQuestionnaire36.update');
//study specific Interim Questionnaire(48 hours Post Dose Visit)
Route::post('sp_iq48/{id}','SP_IQ48_Controller@store')->name('sp_IQuestionnaire48.store');
Route::put('sp_iq48/{patient_id}/update/{study_id}/{study_period}','SP_IQ48_Controller@update')->name('sp_IQuestionnaire48.update');
//study specific Interim Questionnaire(72 hours Post Dose Visit)
Route::post('sp_iq72/{id}','SP_IQ72_Controller@store')->name('sp_IQuestionnaire72.store');
Route::put('sp_iq72/{patient_id}/update/{study_id}/{study_period}','SP_IQ72_Controller@update')->name('sp_IQuestionnaire72.update');
//study specific Interim Questionnaire(96 hours Post Dose Visit)
Route::post('sp_iq96/{id}','SP_IQ96_Controller@store')->name('sp_IQuestionnaire96.store');
Route::put('sp_iq96/{patient_id}/update/{study_id}/{study_period}','SP_IQ96_Controller@update')->name('sp_IQuestionnaire96.update');

//Safety Follow Up Questionnaire & Conclusion of Participation
Route::post('/FollowUpQuestion/{PID}/{study_id}','PostStudy_Controller@updateFollowUpQ')->name('updateFollowUpQ');
Route::get('/FollowUpQuestion/download/{PID}/{study_id}','PostStudy_Controller@downloadFollowUpQ')->name('downloadFollowUpQ');

Route::post('/ConclusionParticipation/{PID}/{study_id}','PostStudy_Controller@updateConclusionP')->name('updateConclusionP');
Route::get('/ConclusionParticipation/download/{PID}/{study_id}','PostStudy_Controller@downloadConclusionP')->name('downloadConclusionP');

//this is to edit the studies detail and the subject study details
Route::get('/studySpecific/details/edit/{id}','SP_Admission_Controller@edit')->name('SubjectStudySpecific.edit');

Route::post('/studySpecific/PSSRemove/{id}/','studySpecificController@PSSRemove')->name('subject.removePSS');

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

Auth::routes();

Route::resource('users','Admin\UsersController',['except'=>['show','create','store']]);

Route::resource('preScreening','preScreeningController');

Route::resource('studySpecific','studySpecificController');

//testing only
