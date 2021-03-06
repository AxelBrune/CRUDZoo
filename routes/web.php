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
    return view('welcome');
});

Route::get('/animalsList/{q?}', 'Generalcontroller@index');
Route::post('/animalsList', 'Generalcontroller@store');
Route::get('/animal/edit/{id}', 'Generalcontroller@edit');
Route::patch('/animal/edit/{id}', 'Generalcontroller@update');
Route::delete('/animal/{id}', 'Generalcontroller@destroy');
