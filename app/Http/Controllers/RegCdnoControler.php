<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class RegCdnoControler extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getRegCdno(Request $request){
        $sql_string = "SELECT DISTINCT
        lara_regcdno.NombreCdno,
        lara_regcdno.TelMovilPpal,
        lara_regcdno.BigDataCorreo,
        lara_regcdno.DireccionCdno,
        lara_regcdno.id,
        lara_groupfamilia.casaRef
        FROM
        lara_regcdno
        LEFT JOIN lara_groupfamilia ON lara_regcdno.CedulaCdno = lara_groupfamilia.cedulaindividuo
        WHERE
        lara_regcdno.CedulaCdno = '" . $request->cedula . "'";
            $resp = DB::select($sql_string);
            return response()->json($resp);
    }
}
