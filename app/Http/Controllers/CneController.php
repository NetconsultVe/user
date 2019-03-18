<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class CneController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function GetMunicipios(){
        $sql_string = "SELECT cne_geomp.CodMunicipio, cne_geomp.NameMunicipio, cne_geomp.IdMunicipio FROM cne_geomp";
        $resp = DB::select($sql_string);
        return response()->json($resp);
    }

    public function GetParroquias(Request $request){
        $sql_string = "SELECT cne_geopq.NameParroauia,cne_geopq.CodParroquia,cne_geopq.IdParroquia FROM cne_geopq WHERE cne_geopq.IdMunicipio = " . $request->id;
        $resp = DB::select($sql_string);
        return response()->json($resp);
    }

    public function GetUbchs(Request $request){
        $sql_string ="SELECT DISTINCT
        psuv_ubch.CodUBCH,
        psuv_ubch.NombreUBCH
        FROM
        psuv_ubch
        WHERE
        psuv_ubch.CodMun = " . $request->cod_mp . " AND
        psuv_ubch.CodPaq = " . $request->cod_pq . "";    
        $resp = DB::select($sql_string);
        return response()->json($resp);   
    }

    public function get_listcentro($mp,$pq){
        $sql_string = "SELECT
        psuv_ubch.CodEdo,
        psuv_ubch.CodMun,
        psuv_ubch.CodPaq,
        psuv_ubch.CIR,
        psuv_ubch.CodUBCH,
        psuv_ubch.NombreUBCH,
        psuv_ubch.DireccionUBCH,
        psuv_ubch.CedulaJefeUbch,
        psuv_ubch.id_ubch
        FROM
        psuv_ubch
        WHERE
        psuv_ubch.CodMun = ". $mp ."  AND
        psuv_ubch.CodPaq = " . $pq;
        $resp = DB::select($sql_string);
        return response()->json($resp);
    }




}
