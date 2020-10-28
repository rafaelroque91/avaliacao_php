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

Route::get('/atualizabase', 'AtualizaBaseController@AtualizaDados');

Route::get('/user-timelogs', 'ExibeDadosController@userTimeLogs');

Route::get('/component-metadata', 'ExibeDadosController@componentMetadata');
