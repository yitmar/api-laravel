<?php

namespace App\Http\Controllers;

//use Illuminate\Http\Request;
use Request;
 use DB;

class pessoaFisica extends Controller
{
    public function search(Request $request) {

        // Sets the parameters from the get request to the variables.
        $cpf = Request::post('cpf');

        // Perform the query using Query Builder
        $result = DB::table('fisica')
            ->select( 'cpf','nome')
            ->where('cpf', '=', $cpf)
            ->get();

        return $result;
    }

    public function search_api(Request $request) {

        // Sets the parameters from the get request to the variables.
        $cpf = Request::post('cpf');

        // Perform the query using Query Builder
        $result = DB::table('fisica')
            ->select( 'cpf','nome')
            ->where('cpf', '=', $cpf)
            ->get();

        return vies ('resultado',  $result);
    }

    public function store(Request $request)
    {
        $name = $request->input('cpf');

        $cpf = DB::table('pessoa')->where('cpf', $name)->get();

        echo $cpf->datos;
        if ($cpf is null)
        {
            return  $cpf=('no se encontrol datos');
        }
        else
        {
            return  $cpf->datos;
        }
    }
    
    
}

// <script>
//     var app = <?php echo json_encode($array); ?>;
// </script>