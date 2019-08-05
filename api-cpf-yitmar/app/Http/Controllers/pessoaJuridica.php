<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pessoaJuridica extends Controller
{
    public function search(Request $request) {

        // Sets the parameters from the get request to the variables.
        $cvp = Request::get('cvp');

        // Perform the query using Query Builder
        $result = DB::table('juridica')
            ->select( 'cvp','nome')
            ->inner('fisica', 'id', 'id' )
            ->where('cvp', '=', $cvp)
            ->get();

        return view ('', $result);
    }

    public function search_api(Request $request) {

        // Sets the parameters from the get request to the variables.
        $cvp = Request::get('cvp');

        // Perform the query using Query Builder
        $result = DB::table('juridica')
            ->select( 'cvp','nome')
            ->where('cvp', '=', $cvp)
            ->get();

        return $result;
    }
    public function store(Request $request)
    {
        $name = $request->input('cpf');

        $cpf = DB::table('pessoa')->where('cvp', $name)->get();

        echo $cpf->datos;
        
    }
}
