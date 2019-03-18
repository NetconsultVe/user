<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\lara_regcomunidades;
use App\psuv_ubch;
use DB;

class ComunidadController extends Controller
{
    public function index(){
        return view('comunidad.index');
    }

// función correspondiente addcomunidad desde vista Ubch
    public function get_listComunidad2(Request $request){
        $sql_string = "SELECT DISTINCT
        lara_regcomunidades.LaraNameComunidad,
        lara_regcomunidades.id
        FROM
        lara_regcomunidades
        WHERE
        lara_regcomunidades.cne_CodCentro = " . $request->cod_ubch;
            $resp = DB::select($sql_string);
            $arreglo["data"] = $resp;
            return response()->json($arreglo);
    }
    
    public function get_listComunidad(Request $request){

        $sql_string = "SELECT DISTINCT
        lara_regcomunidades.LaraCodComunidad,
        lara_regcomunidades.LaraNameComunidad,
        lara_regcomunidades.id,
        lara_regcdno.CedulaCdno,
        lara_regcdno.NombreCdno,
        lara_regcdno.TelMovilPpal
        FROM
        lara_regcomunidades
        LEFT JOIN lara_regcdno ON lara_regcomunidades.LaraRespComunidad = lara_regcdno.CedulaCdno
        WHERE
        lara_regcomunidades.cne_CodCentro = " . $request->cod_ubch;
            return DB::select($sql_string);
            // return response()->json($resp);
    }

    public function get_Comunidad(Request $request){
        $sql_string = "SELECT
        lara_regcomunidades.LaraCodComunidad,
        lara_regcomunidades.LaraNameComunidad,
        lara_regcomunidades.LaraDirComunidad,
        lara_regcdno.CedulaCdno,
        lara_regcdno.NombreCdno,
        lara_regcdno.TelMovilPpal,
        lara_regcdno.BigDataCorreo,
        lara_regcdno.DireccionCdno
        FROM
        lara_regcomunidades
        LEFT JOIN lara_regcdno ON lara_regcomunidades.LaraRespComunidad = lara_regcdno.CedulaCdno
        WHERE
        lara_regcomunidades.id = " . $request->id;
            $resp = DB::select($sql_string);
            return response()->json($resp);
    }


    public function get_SelectComunidad(Request $request){
        $sql_string = "SELECT
        lara_regcomunidades.LaraCodComunidad,
        lara_regcomunidades.LaraNameComunidad
        FROM
        lara_regcomunidades
        WHERE
        lara_regcomunidades.cne_CodCentro  = " . $request->id;
            $resp = DB::select($sql_string);
            return response()->json($resp);
    }

    public function CreateUbchComunidad(Request $data){
        $IdUbch = DB::table('psuv_ubch')->where('CodUBCH', $data['cod_ubch'])->value('id_ubch'); 
        $corelativo = DB::table('psuv_ubch')->where('CodUBCH', $data['cod_ubch'])->value('NoComunidad') + 1;
        $LaraCodComunidad = '11-'.$data['cod_mud'].'-'.$data['cod_pq'].'-'.$data['cod_ubch'].'-'.$corelativo;
            
        $Insertcomunidad = lara_regcomunidades::create([
            'cne_GepMp' => $data['cod_mud'],
            'cne_GoePq' => $data['cod_pq'],
            'cne_CodCentro' => $data['cod_ubch'],
            'LaraCodComunidad' => $LaraCodComunidad,            
            'id_ubch' =>  $IdUbch,
            'LaraNameComunidad' => $data['nameComuniti'],        
            ]);

            $respRgdCdno = DB::table('psuv_ubch')->where('CodUBCH',$data['cod_ubch'])->update([
                'NoComunidad' => $corelativo
                  ]);

            $idupdate = DB::table('users')->where('email',$data['email'])->update([
                'cod_comun' => $LaraCodComunidad
                    ]);

            return response()->json(["resp"=> '1']);
    }

    public function UpdateUbchComunidad(Request $data){
        return  DB::table('lara_regcomunidades')->where('id',$data['id'])->update([
            'LaraNameComunidad' => $data['LaraNameComunidad']
                ]);

    }
}
