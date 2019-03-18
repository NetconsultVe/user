<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lara_regmanzana extends Model
{
    //lara_regmanzana
    protected $table = 'lara_regmanzana';
    protected $fillable = [
        'cne_GepMp',
        'cne_GoePq',
        'cne_CodCentro',
        'LaraCodComunidad',
        'LaraCodManzana',
        'NameManzana',
        'LaraRespManzana',
        'id_Comunidad',
        'ServAguaPotable',
        'ServGas',
        'Electricidad',
        'TransportePublico',
        'AguasServidas',
        'Telefono',
        'Internet',
        'Vialidad',
    ];
}
