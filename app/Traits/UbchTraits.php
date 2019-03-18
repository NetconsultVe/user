<?php

namespace App\Traits;

use DB;

trait UbchTraits{

    public function UpdateJefeUbch($data){       
        return DB::table('psuv_ubch')->where('CodUBCH',$data['cod_ubch'])->update([
                'CedulaJefeUbch' => $data['cedula'],
                ]);
    }

    public function UpdateComunidad($data){
        return DB::table('lara_regcomunidades')->where('id',$data['id'])->update([
            'LaraRespComunidad' => $data['cedula'],
            'LaraNameComunidad' => $data['nameComuniti'],
            ]);
    }


    public function UpdateCalle($data){
        
        return DB::table('lara_regmanzana')->where('id',$data['id'])->update([
             'NameManzana'=> $data['NameManzana'],
             'LaraRespManzana' => $data['cedula'],  
             'ServAguaPotable' => $data['ServAguaPotable'],   
             'ServGas' => $data['ServGas'],   
             'Electricidad' => $data['Electricidad'],   
             'TransportePublico'  => $data['TransportePublico'],   
             'AguasServidas' => $data['AguasServidas'],   
             'Telefono' => $data['Telefono'],   
             'Internet' => $data['Internet'],   
             'Vialidad' => $data['Vialidad']   
            ]); 

    }

//fin
}
