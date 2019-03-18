<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;

class UbchController extends Controller
{


    public function __construct()
    {
        $this->middleware('auth');
    }

    public function get_listUbch(Request $request)
    {
        $sql_string = "SELECT DISTINCT
        psuv_ubch.id_ubch,
        psuv_ubch.CodUBCH,
        psuv_ubch.NombreUBCH,
        psuv_ubch.DireccionUBCH,
        lara_regcdno.CedulaCdno,
        lara_regcdno.NombreCdno,
        lara_regcdno.TelMovilPpal
        FROM
        psuv_ubch
        LEFT JOIN lara_regcdno ON psuv_ubch.CedulaJefeUbch = lara_regcdno.CedulaCdno
        WHERE
        psuv_ubch.CodMun = " . $request->cod_mp . "  AND
        psuv_ubch.CodPaq = " . $request->cod_pq;
        $resp = DB::select($sql_string);
        $arreglo["data"] = $resp;
        return response()->json($arreglo);
    }

    public function get_SearchUbch(Request $request)
    {

        $sql_string = "SELECT DISTINCT
        psuv_ubch.id_ubch,
        psuv_ubch.CodUBCH,
        psuv_ubch.NombreUBCH,
        psuv_ubch.DireccionUBCH,
        lara_regcdno.CedulaCdno,
        lara_regcdno.NombreCdno,
        lara_regcdno.TelMovilPpal,
        lara_regcdno.BigDataCorreo,
        lara_regcdno.DireccionCdno
        FROM
        psuv_ubch
        LEFT JOIN lara_regcdno ON psuv_ubch.CedulaJefeUbch = lara_regcdno.CedulaCdno
        WHERE
        psuv_ubch.CodUBCH = '" . $request->id . "'";
        $resp = DB::select($sql_string);
        return response()->json($resp);


    }

    public function index()
    {
        return view('ubch.index');
    }

    public function validaJefedeUBCH(Request $request){

        $sql_string ="SELECT DISTINCT
        cne_geomp.NameMunicipio,
        cne_geopq.NameParroauia,
        psuv_ubch.CodUBCH,
        psuv_ubch.NombreUBCH,
        lara_regcdno.NombreCdno
        FROM
        cne_geomp
        INNER JOIN cne_geopq ON cne_geomp.IdMunicipio = cne_geopq.IdMunicipio
        INNER JOIN psuv_ubch ON cne_geopq.CodParroquia = psuv_ubch.CodPaq AND cne_geopq.IdMunicipio = psuv_ubch.CodMun
        INNER JOIN lara_regcdno ON psuv_ubch.CedulaJefeUbch = lara_regcdno.CedulaCdno where lara_regcdno.CedulaCdno = " . $request->cedula;
        
        $resp = DB::select($sql_string);
        return response()->json($resp);
        
    }
    
    public function GetMostrarUbch(Request $request){

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


    public function validaJefedeComunidad(Request $request){

        $sql_string ="SELECT DISTINCT
        cne_geomp.NameMunicipio,
        cne_geopq.NameParroauia,
        psuv_ubch.CodUBCH,
        psuv_ubch.NombreUBCH,
        psuv_ubch.CodMun,
        lara_regcomunidades.LaraCodComunidad,
        lara_regcomunidades.LaraNameComunidad,
        lara_regcdno.NombreCdno
        FROM
        cne_geomp
        LEFT JOIN cne_geopq ON cne_geomp.IdMunicipio = cne_geopq.IdMunicipio
        INNER JOIN psuv_ubch ON cne_geopq.CodParroquia = psuv_ubch.CodPaq AND cne_geopq.IdMunicipio = psuv_ubch.CodMun
        INNER JOIN lara_regcomunidades ON psuv_ubch.CodUBCH = lara_regcomunidades.cne_CodCentro
        INNER JOIN lara_regcdno ON lara_regcomunidades.LaraRespComunidad = lara_regcdno.CedulaCdno where lara_regcdno.CedulaCdno = " . $request->cedula;
        
        $resp = DB::select($sql_string);
        return response()->json($resp);
        
    }

    public function validaManzanero(Request $request){

        $sql_string ="SELECT DISTINCT
        cne_geomp.NameMunicipio,
        cne_geopq.NameParroauia,
        psuv_ubch.CodUBCH,
        psuv_ubch.NombreUBCH,
        lara_regcomunidades.LaraCodComunidad,
        lara_regcomunidades.LaraNameComunidad,
        lara_regmanzana.LaraCodManzana,
        lara_regmanzana.NameManzana,
        lara_regcdno.CedulaCdno,
        lara_regcdno.NombreCdno
        FROM
        cne_geomp
        LEFT JOIN cne_geopq ON cne_geomp.IdMunicipio = cne_geopq.IdMunicipio
        INNER JOIN psuv_ubch ON cne_geopq.CodParroquia = psuv_ubch.CodPaq AND cne_geopq.IdMunicipio = psuv_ubch.CodMun
        INNER JOIN lara_regcomunidades ON psuv_ubch.CodUBCH = lara_regcomunidades.cne_CodCentro
        INNER JOIN lara_regmanzana ON lara_regcomunidades.LaraCodComunidad = lara_regmanzana.LaraCodComunidad
        INNER JOIN lara_regcdno ON lara_regmanzana.LaraRespManzana = lara_regcdno.CedulaCdno
        WHERE
        lara_regcdno.CedulaCdno = " . $request->cedula;
        
        $resp = DB::select($sql_string);
        return response()->json($resp);
        
    }


}
