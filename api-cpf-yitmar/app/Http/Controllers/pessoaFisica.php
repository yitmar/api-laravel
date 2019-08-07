<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;

class pessoaFisica extends Controller
{
    public function search(Request $request) {
        
        
        $request->validate([

            'cpf' => 'required |min:11| max:11| regex:/^[0-9]{11}/' 
        
        ]);
   
   
        $cpf=$request['cpf'];
        // Perform the query using Query Builder
        $result = DB::table('fisica')
            ->select( 'cpf','nome')
            ->where('cpf', '=', $cpf)
            ->get();

        return view ('resultado_cpf', ['result' => $result]);
        // return $result;
    }

    public function search_efecto(Request $request) {
        
        $request->validate([
        
            'cnpj' => '' 
        ]);

        return  $request;
   
        // Sets the parameters from the get request to the variables.
        $cnpj=$request['cnpj'];

        // Perform the query using Query Builder
        $result = DB::table('juridica')
            ->select( 'juridica.cnpj', 'juridica.nome', 'fisica.cpf','fisica.nome as nome_fisico' )
            ->join('fisica', 'juridica.idfisica', '=','fisica.id' )
            ->where('cnpj', '=', $cnpj)
            ->get();

        return view ('resultado_cnpj', ['result' => $result]);
    }

    public function search_api(Request $request) {

        // Sets the parameters from the get request to the variables.
        $cpf=$request['cpf'];
        // Perform the query using Query Builder
        $result = DB::table('fisica')
            ->select( 'cpf','nome')
            ->where('cpf', '=', $cpf)
            ->get();

        if (count($result) === 0)
        {
            $a = DB::table('error')
            ->select( 'codigo','messaje')
            ->where('codigo', '=', 2001)
            ->get();

            return $a;
        }
        else 
        {
            return $result;
        }    

    }

    public function register(Request $request ){
       
        $request->validate([

            'cpf' => 'required |min:9| max:9| regex:/^[0-9]{9}/',
            'nome'=> 'required'
        ]);
        $cpf=$request['cpf'];
        $a=array(10,9,8,7,6,5,4,3,2);
        $b=array(11,10,9,8,7,6,5,4,3,2);
        $c=$array  = array_map('intval', str_split($cpf));
        $suma=0;
        $d=array();

        for ($i = 0; $i <9; $i++) {
            $suma_1=$a[$i] * $c[$i];
            $suma=$suma_1+$suma;
            
        };
        $residuo=$suma%11;

        $dijo=11-$residuo;
        if ($dijo==10){
            $dijo=0;
        }        

        $suma=0;
    
        for ($i = 0; $i <10; $i++) {
            if ($i==9) {
                $suma_1=$b[$i] * $dijo;
                $suma=$suma_1+$suma;
         
            }
            else{
                $suma_1=$b[$i] * $c[$i];
                $suma=$suma_1+$suma;

            }
            
        };

        $residuo=$suma%11;

        $dijo_2=11-$residuo;
        if ($dijo_2==10){
            $dijo=0;
        }
        
        $cpf_completo= '';
        foreach ($c as $stringArray)
        {
          $cpf_completo = $cpf_completo.$stringArray;
        }
        $cpf_completo = $cpf_completo.$dijo;
        $cpf_completo = $cpf_completo.$dijo_2;

        $nome=$request['nome'];
        
        $result = DB::table('fisica')
        ->insert( 
            ['cpf'=>$cpf_completo, 'nome'=>$nome]
        );
        return view ('resgritro_cpf',['cpf_completo' => $cpf_completo]);

    }
   
    
}

