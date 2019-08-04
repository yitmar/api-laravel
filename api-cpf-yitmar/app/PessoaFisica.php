<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaFisica extends Model
{
    protected $table = 'fisica';

    protected $fillable = ['id', 'nome', 'cpf'];
 

    // public function PessoaFisica()
    // {
    //     return $this->hasMany('App\PessoaFisica');
    // }
}
