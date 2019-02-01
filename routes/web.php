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
Route::get('/gridlist','GridList@index');
Route::get('/grid/{id}','Grid@index');
Route::post('/grid/{id}/update','Grid@update');
Route::get('/grid/{id}/edit','Grid@edit');
Route::post('/grid/{id}/edit/addstudent','Grid@addstudent');
Route::post('/grid/{id}/edit/addcriteria','Grid@addcriteria');
