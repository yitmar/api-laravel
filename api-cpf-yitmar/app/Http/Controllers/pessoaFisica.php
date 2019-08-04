<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class pessoaFisica extends Controller
{
   
    public function store(Request $request)
    {
        $name = $request->input('cpf');

        $cpf = DB::table('pessoa')->where('cpf', $name)->get();

        echo $cpf->datos;

        
    }
    
}

// <script>
//     var app = <?php echo json_encode($array); ?>;
// </script>