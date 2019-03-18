<?php

namespace App\Traits;
use DB;
use App\lara_regcdno;
use App\lara_groupfamilia;

trait CdnoTraits{

    public function ValidaMailCdno($data){
        $idExist = DB::table('lara_regcdno')->where('BigDataCorreo', $data->email)->value('CedulaCdno');        if($idExist !== null){
            if($idExist == $data['CedulaCdno']){
                return response()->json(["resp"=> '1']);
            } else {
                return response()->json(["resp"=> '0']);
            }
        } else {
            return response()->json(["resp"=> '-1']);
        }
    }

    public function UpdateMailTelePpalCdno($data){
        return DB::table('lara_regcdno')->where('CedulaCdno',$data['cedula'])->update([
            'BigDataCorreo' => $data['email'],
            'TelMovilPpal' => $data['tele_ppal'],
            'DireccionCdno' => $data['dir']
        ]);
    }

    public function UpdateRegFamiliarCdno($data){
        
        return DB::table('lara_regcdno')->where('CedulaCdno',$data['cedula'])->update([
            'RegCarnetPatria' => $data['RegCarnetPatria'],
            'RegHogaresPatria' => $data['RegHogaresPatria'],
            'RegPatriActualizado' => $data['RegPatriActualizado'],
            'BeneficiarioClap' => $data['BeneficiarioClap'],
            'RegAdultoMayor' => $data['RegAdultoMayor'],
            'ActAmorMayor' => $data['ActAmorMayor'],
            'RegEmbarazada' => $data['RegEmbarazada'],
            'RegPartoHumanizado' => $data['RegPartoHumanizado'],
            'RegDiversidadFuncional' => $data['RegDiversidadFuncional'],
            'RegJoseGregorioHernandez' => $data['RegJoseGregorioHernandez'],
            'RegPatologiaCronica' => $data['RegPatologiaCronica'],
            'Reg0800Ayuda' => $data['Reg0800Ayuda'],
            'Trabaja' => $data['Trabaja'],
            'Estudia'  => $data['Estudia'],	
            'ViviendaPropia'  => $data['ViviendaPropia'],
            'ViviendaTipoRancho'  => $data['ViviendaTipoRancho'],
            'CodNucleoFamiliar'  => $data['CodNucleoFamiliar'],
            'BigDataCorreo' => $data['email'],
            'TelMovilPpal' => $data['tele_ppal'],
            'DireccionCdno' => $data['dir'],
            'jefedefamilia' =>  $data['jefedefamilia'],
        ]);

    }

    public function insertRegCdnoFamily($data){

        $cod_familia = lara_groupfamilia::where('cedulajefe',$data['cedulajefe'])->value('cod_familia');
        $data['CodNucleoFamiliar'] = $cod_familia;
        $time = strtotime($data['FechaNacCdno']);
        $newformat = date('yy-m-d', $time);
        $data['FechaNacCdno'] = $newformat;
        $algo = lara_regcdno::create([
            'CodEdo' => 11,
            'CodMun' => $data['CodMun'],
            'CodPaq' => $data['CodPaq'],
            'FechaNacCdno' => $data['NacElector'],
            'NacElector'=> $data['NacElector'],
            'CodCentro' => $data['CodCentro'],
            'CedulaCdno' => $data['cedula'],
            'NombreCdno' => $data['NombreCdno'],
            'FechaNacCdno' => $data['FechaNacCdno'],
            'SexoCdno' => $data['SexoCdno'],
            'DireccionCdno' => $data['DireccionCdno'],
            'NoResidenciaCdno' => $data['NoResidenciaCdno'],
            'EdadCdno' => $data['EdadCdno'],
            'RegCarnetPatria' => $data['RegCarnetPatria'],
            'RegHogaresPatria' => $data['RegHogaresPatria'],
            'RegPatriActualizado' => $data['RegPatriActualizado'],
            'BeneficiarioClap' => $data['BeneficiarioClap'],
            'RegAdultoMayor' => $data['RegAdultoMayor'],
            'ActAmorMayor' => $data['ActAmorMayor'],
            'RegEmbarazada' => $data['RegEmbarazada'],
            'RegPartoHumanizado' => $data['RegPartoHumanizado'],
            'RegDiversidadFuncional' => $data['RegDiversidadFuncional'],
            'RegJoseGregorioHernandez' => $data['RegJoseGregorioHernandez'],
            'RegPatologiaCronica' => $data['RegPatologiaCronica'],
            'Reg0800Ayuda' => $data['Reg0800Ayuda'],
            'Trabaja' => $data['Trabaja'],
            'Estudia'  => $data['Estudia'],	
            'ViviendaPropia'  => $data['ViviendaPropia'],
            'ViviendaTipoRancho'  => $data['ViviendaTipoRancho'],
            'CodNucleoFamiliar'  => $data['cod_familia'],
            'BigDataCorreo' => $data['email'],
            'TelMovilPpal' => $data['tele_ppal'],
            'DireccionCdno' => $data['dir'],
            'jefedefamilia' =>  $data['jefedefamilia'],
            'MenorEdad' =>  $data['MenorEdad '],
            'folio' =>  $data['folio'],
            'noPartida' =>  $data['noPartida'],
            'MenorEdad' =>  $data['MenorEdad'],
        ]);




    }

}