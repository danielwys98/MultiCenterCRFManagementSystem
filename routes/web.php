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
    return view('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
});

Route::get('/preScreening', function () {
    return view('preScreening');
});

Route::get('/studySpecific', function () {
    return view('studySpecific');
});

Route::get('/preScreeningdb', function () {
    return view('preScreeningdb');
});

Route::get('/studySpecificdb', function () {
    return view('studySpecificdb');
});

Route::get('/preScreeningForm', function () {
    return view('preScreeningForm');
});

Route::get('/admin', function () {
    return view('admin');
});
