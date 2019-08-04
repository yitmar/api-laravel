<?php


use App\PessoaFisica;
use App\PessoaJuridico;


use App\Http\Resources\Consulta;


use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::middleware('auth:api')->get('/query_ap', function (Request $request) {
    return $request->user();
});
Route::middleware('auth:api')->get('/responder', function (Request $request) {
    return $request->user();
});
