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
//buscardor
    Route::get('/buscar_fisica', 'pessoaFisica@search');
    Route::get('/buscar_juridica', 'pessoaJuridica@search');

//efectp
    Route::get('/consulta_fisica_efecto', function () {        
        return view('consulta_cpf_efecto');
    });
    Route::get('/buscar_fisica_2', 'pessoaFisica@search_efecto');

//consulta
     Route::get('/consulta_fisica', function () {        
        return view('consulta_cpf');
    });
    Route::get('/consulta_juridica', function () {        
        return view('consulta_cnpj');
    });
//post cadastro

Route::post('/save_fisica','pessoaFisica@register');
Route::post('/save_empresa', 'pessoaJuridica@register');

//cregistra
    Route::get('/registro_pessoa', function () {        
        return view('registro_pessoa');
    });

    Route::get('/registro_juridica', 'pessoaJuridica@search_id_pessoa');

//api
    Route::get('/consulta_api_fisica', 'pessoaFisica@search_api');

    Route::get('/consulta_api_juridica', 'pessoaJuridica@search_api');

    
    