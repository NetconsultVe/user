<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class lara_groupfamilia extends Model
{
    protected $table = 'lara_groupfamilia';
    protected $fillable = [
        'cod_familia',
        'cedulajefe',
        'cedulaindividuo',
        'NoPartida',
        'Folio',
        'tipo',
        'id_regcdno',
        'cod_calle',
        'casaRef'
    ];
}
