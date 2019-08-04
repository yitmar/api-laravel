<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PessoaJuridico extends Model
{
    protected $table = 'juridica';

    protected $fillable = ['id', 'nome', 'cvp'];

    public function scopeHasLimit($query)
    {
        return $query->where('limit', '>', 0);
    }
}
