<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;


class pessoaJuridica extends Controller
{
    public function search(Request $request) {
        
        $request->validate([
        
            'cnpj' => 'required | min:14 | max:14 | regex:/^[0-9]{14}/' 
        ]);
   
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
        $cnpj=$request['cnpj'];

        // Perform the query using Query Builder
        $result = DB::table('juridica')
            ->select( 'juridica.cnpj', 'juridica.nome', 'fisica.cpf','fisica.nome as nome_fisico' )
            ->join('fisica', 'juridica.idfisica', '=','fisica.id' )
            ->where('cnpj', '=', $cnpj)
            ->get();

        if (count($result) === 0){
            $a = DB::table('error')
            ->select( 'codigo','messaje')
            ->where('codigo', '=', 2001)
            ->get();

            return $a;
            }
        else {
            return $result;
        }    

    }

    public function register(Request $request ){
        
  
        $request->validate([

            'cnpj' => 'required |min:12| max:12| regex:/^[0-9]{12}/',
            'nome'=> 'required',
            'cpf' => 'required | numeric ',

        ]);

        $a=array(5,4,3,2,9,8,7,6,5,4,3,2);
        $b=array(6,5,4,3,2,9,8,7,6,5,4,3,2);
        
        $cnpj=$request['cnpj'];
        $c=$array  = array_map('intval', str_split($cnpj));
        $suma=0;

        for ($i = 0; $i <5; $i++) {
            $suma_1=$a[$i] * $c[$i];
            $suma=$suma_1+$suma;
            
        };
        return $suma;
        $residuo=$suma%11;

        $dijo=11-$residuo;
        if ($dijo==10){
            $dijo=0;
        }        

        $suma=0;
    
        for ($i = 0; $i <12; $i++) {
            if ($i==12) {
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
        
        $cnpj_completo= '';
        foreach ($c as $stringArray)
        {
          $cnpj_completo = $cnpj_completo.$stringArray;
        }
        $cnpj_completo = $cnpj_completo.$dijo;
        $cnpj_completo = $cnpj_completo.$dijo_2;

        $cpf=$request['cpf'];
        $nome=$request['nome'];

      
        $result = DB::table('juridica')
        ->insert( 
            ['cnpj'=>$cnpj_completo, 'nome'=>$nome, 'idfisica'=>$cpf]
        );
        
        return view ('resgritro_cnpj',['cnpj_completo' => $cnpj_completo]);
   
    }
    public function search_id_pessoa(Request $request ){


        $result = DB::table('fisica')
        ->select( 'id', 'cpf' )
        ->get();
        
        return view ('registro_empresa', ['result' => $result]);
        //return ($result);
    }
}
