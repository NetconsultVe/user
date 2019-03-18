<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CalleController extends Controller
{
    public function index(){
        return view('calle.index');
    }

    public function get_manzana(Request $request){
        $sql_string = "SELECT
        lara_regmanzana.LaraCodManzana,
        lara_regcdno.CedulaCdno,
        lara_regcdno.NombreCdno,
        lara_regcdno.BigDataCorreo,
        lara_regcdno.TelMovilPpal,
        lara_regmanzana.NameManzana,
        lara_regmanzana.id
    FROM
    lara_regmanzana
    LEFT JOIN lara_regcdno ON lara_regmanzana.LaraRespManzana = lara_regcdno.CedulaCdno
    WHERE
            lara_regmanzana.LaraCodComunidad = '" . $request->id . "'";
                return DB::select($sql_string);
    }

    public function getManzanero(Request $request){

        $sql_string = "SELECT DISTINCT
        lara_regcdno.NombreCdno,
        lara_regmanzana.LaraCodManzana,
        lara_regmanzana.NameManzana,
        lara_regmanzana.LaraRespManzana,
        lara_regcdno.BigDataCorreo,
        lara_regcdno.TelMovilPpal,
        lara_regmanzana.Vialidad,
        lara_regmanzana.Internet,
        lara_regmanzana.Telefono,
        lara_regmanzana.AguasServidas,
        lara_regmanzana.TransportePublico,
        lara_regmanzana.Electricidad,
        lara_regmanzana.ServGas,
        lara_regmanzana.ServAguaPotable,
        lara_regmanzana.id,
        lara_regmanzana.referencia,
        lara_regcdno.CedulaCdno,
        lara_regcdno.DireccionCdno
        FROM
        lara_regmanzana
        LEFT JOIN lara_regcdno ON lara_regmanzana.LaraRespManzana = lara_regcdno.CedulaCdno
        WHERE
        lara_regmanzana.id = " . $request->id;
                $resp = DB::select($sql_string);
                return response()->json($resp);
        

    }
}
