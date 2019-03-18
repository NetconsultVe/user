<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lara_regcomunidades extends Model
{
    protected $table = 'lara_regcomunidades';
    protected $fillable = [
        'cne_GepMp',
        'cne_GoePq',
        'cne_CodCentro',
        'LaraCodComunidad',
        'LaraRespComunidad',
        'id_ubch',
        'LaraNameComunidad',
        'NoManzanas',
        'LaraDirComunidad'
  

    ];
}
