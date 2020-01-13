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

Route::get('/request', 'ImportRequest\ImportRequestsController@index')->name('import_request.index');
Route::post('/import-request', 'ImportRequest\ImportRequestsController@store')->name('import_request.store');
Route::post('/import-request-delete', 'ImportRequest\ImportRequestsController@destroy')->name('import_request.destroy');
