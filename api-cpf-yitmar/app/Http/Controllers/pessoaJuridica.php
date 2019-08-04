<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pessoaJuridica extends Controller
{
  
    public function store(Request $request)
    {
        $name = $request->input('cpf');

        $cpf = DB::table('pessoa')->where('cvp', $name)->get();

        echo $cpf->datos;
        
    }
}
