<?php

use Illuminate\Support\Facades\Auth;
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

Auth::routes(['register' => true]);

Route::get('/home', 'HomeController@index');

Route::get('departamentos', 'DepartamentoController@index');
Route::get('departamentos/show', 'DepartamentoController@getList');
Route::post('departamentos/update', 'DepartamentoController@update');
Route::post('departamentos/delete', 'DepartamentoController@delete');
Route::post('departamentos/save', 'DepartamentoController@save');

