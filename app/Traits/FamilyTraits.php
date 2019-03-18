<?php

namespace App\Traits;
use App\lara_groupfamilia;

trait FamilyTraits{

public function NewMiembroFamily($data){

    return lara_groupfamilia::create([
        'cod_familia' => $data['cod_familia'], 
        'cedulajefe'=> $data['cedulajefe'],
        'cedulaindividuo'=> $data['cedulaindividuo'],
        'NoPartida'=> $data['NoPartida'],
        'Folio'=> $data['Folio'],
        'tipo'=> $data['tipo'], //1-Jefe de Familia, 2-Miembro Mayor de Edad,3 Miembro Menor Cedulado, 4 miembro menor no cedulado
        'id_regcdno'=> $data['id_regcdno'], 
        'cod_calle'=> $data['cod_manzana'], 
        'casaRef'=>$data['casaRef']

    ]);


}

public function UpdMiembroFamily($data){

    $idgrupofamilia = lara_groupfamilia::where('cedulaindividuo',$data['cedulaindividuo'])->value('id');
    $data['idgrupofamilia']= $idgrupofamilia;
    return lara_groupfamilia::where('id',$data['idgrupofamilia'])->update([
        'cod_familia' => $data['cod_familia'], 
        'cedulajefe'=> $data['cedulajefe'],
        'cedulaindividuo'=> $data['cedulaindividuo'],
        'NoPartida'=> $data['NoPartida'],
        'Folio'=> $data['Folio'],
        'tipo'=> $data['tipo'], //1-Jefe de Familia, 2-Miembro Mayor de Edad,3 Miembro Menor Cedulado, 4 miembro menor no cedulado
        'id_regcdno'=> $data['id_regcdno'],
        'casaRef'=>$data['casaRef']
    ]);
}











    //fin del traits
}