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

    Route::get('/a', 'pessoaFisica@search');

    Route::get('/b', 'pessoaJuridica@search');

    Route::get('/consulta_api_fisica', 'pessoaFisica@search_api');

    Route::get('/consulta_api_juridica', 'pessoaJuridica@search_api');

    Route::get('/consulta_fisica', function () {        
        return view('consulta_cpf');
    });

    Route::get('/consulta_juridica', function () {        
        return view('consulta_cvp');
    });