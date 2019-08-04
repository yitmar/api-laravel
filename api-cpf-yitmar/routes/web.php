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


    Route::get('/query', function () {
        return view('query');
    });

    Route::post('/responder', function () {
        return view('responder');
    });

    Route::get('/query_api', function () {        
        return  PessoaFisica::all();
    });
 
