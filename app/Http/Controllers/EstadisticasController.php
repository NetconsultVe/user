<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class EstadisticasController extends Controller
{
    public function EstadComunidades(){
        $sql_string = "SELECT DISTINCT
        Count(lara_regcomunidades.id) AS NroComunidades
        FROM
        lara_regcomunidades";
        $resp = DB::select($sql_string);
        $arreglo["data"] = $resp;
        return response()->json($arreglo);
    }

    public function EstadCalles(){
        $sql_string = "SELECT DISTINCT
        Count(lara_regmanzana.id) AS NroCalles
        FROM
        lara_regmanzana";
        $resp = DB::select($sql_string);
        $arreglo["data"] = $resp;
        return response()->json($arreglo);
    }

    public function EstadFamilias(){
        $sql_string = "SELECT DISTINCT
        Count(lara_groupfamilia.cod_familia) AS NroFamilias
        FROM
        lara_groupfamilia";
        $resp = DB::select($sql_string);
        $arreglo["data"] = $resp;
        return response()->json($arreglo);
    }

    public function ChartDona(){
        $sql_string = "SELECT
        Count(psuv_ubch.CedulaJefeUbch) AS NroResponsable,
        (SELECT Count(psuv_ubch.id_ubch) FROM psuv_ubch) AS NroUbch
        FROM
        psuv_ubch
        WHERE
        psuv_ubch.CedulaJefeUbch <> 0";
        $resp = DB::select($sql_string);
        $arreglo["data"] = $resp;
        return response()->json($arreglo);
    }

    public function LineComunidades(){
        $sql_string = "SELECT
        Count(lara_regcomunidades.id) AS ejeY,
        lara_regcomunidades.created_at AS ejeX
        FROM
        lara_regcomunidades
        GROUP BY
        lara_regcomunidades.created_at
        ORDER BY
        ejeX DESC
        LIMIT 6";
        $resp = DB::select($sql_string);
        $arreglo["data"] = $resp;
        return response()->json($arreglo);
    }

    public function LineCalles(){
        $sql_string = "SELECT
        Count(lara_regmanzana.id) AS ejeY,
        lara_regmanzana.created_at AS ejeX
        FROM
        lara_regmanzana
        GROUP BY
        lara_regmanzana.created_at
        ORDER BY
        ejeX DESC
        LIMIT 5";
        $resp = DB::select($sql_string);
        $arreglo["data"] = $resp;
        return response()->json($arreglo);
    }

    public function LineFamilias(){
        $sql_string = "SELECT
        Count(lara_groupfamilia.id) AS ejeY,
        lara_groupfamilia.created_at AS ejeX
        FROM
        lara_groupfamilia
        GROUP BY
        lara_groupfamilia.created_at
        ORDER BY
        ejeX DESC
        LIMIT 5";
        $resp = DB::select($sql_string);
        $arreglo["data"] = $resp;
        return response()->json($arreglo);
    }


}
