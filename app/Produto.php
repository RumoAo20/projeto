<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{
    protected $table = 'produto';

    protected $fillable = [
        'numero_registo', 'chnm', 'descricao_chnm', 'nome_forma_dosagem',
    ];
}
