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

Route::get('/', function () {
    return view('auth.login');
});

Route::get('/dashboard', 'PagesController@index');

Route::get('/preScreening', 'PagesController@preScreening');

Route::get('/studySpecific', 'PagesController@studySpecific');

Route::get('/preScreeningdb','PagesController@preScreeningDB');

Route::get('/studySpecificdb','PagesController@studySpecificdb');



Auth::routes();

Route::get('/preScreeningForm', function () {
    return view('preScreeningForm');
});

Route::namespace('Admin')->prefix('admin')->name('admin.')->middleware('can:adminFunctions')->group(function (){
    Route::resource('users','UsersController',['except'=>['show','create','store']]);
});
