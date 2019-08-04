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

    use App\PessoaFisica;
    use App\PessoaJuridico;

    use App\Http\Resources\Consulta;

    Route::get('/', function () {
        return view('welcome');
    });

    Route::get('/info', function () {
        return  (phpinfo());
    });

    Route::get('/query_api', function () {        
        return  PessoaFisica::find(2);
    });
 
    Route::get('/consulta_fisica', function () {        
        return view('consulta_cpf');
    });

    Route::get('/consulta_juridica', function () {        
        return view('consulta_cvp');
    });

    Route::get('/query_api_fisica/{cpf}', function ($request) {        
        return  PessoaFisica::find(2);
    });

    Route::get('/query_api_jiridica/{cvp}', function ($request) {        
        return PessoaFisica::find(2);
    });
 