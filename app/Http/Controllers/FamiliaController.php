<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\lara_groupfamilia;
use App\Traits\CdnoTraits;
use App\Traits\FamilyTraits;

class FamiliaController extends Controller
{
    use FamilyTraits;
    use CdnoTraits;



    public function index(){
        return view('familia.index');
    }

    public function get_SelectCalle(Request $request){
        $sql_string = "SELECT
        lara_regmanzana.LaraCodManzana,
        lara_regmanzana.NameManzana
        FROM
        lara_regmanzana
        WHERE
        lara_regmanzana.LaraCodComunidad LIKE '" . $request->id . "'";
            $resp = DB::select($sql_string);
            return response()->json($resp);
    }


public function addGroupFamilia(Request $data){
    $corelativo = DB::table('lara_regmanzana')->where('LaraCodManzana', $data['cod_manzana'])->value('NoFamilias') + 1;
    $cod_familia = $data['cod_manzana'].'-'.$corelativo;
    $data['cod_familia']= $cod_familia;
    DB::table('lara_regmanzana')->where('LaraCodManzana',$data['cod_manzana'])->update([
        'NoFamilias' => $corelativo
        ]);

    $this->NewMiembroFamily($data);
    $this->UpdateRegFamiliarCdno($data);
    return  response()->json(["resp" => "1"]);

}


public function updGroupFmilia(Request $data){
    $this->UpdMiembroFamily($data);
    $this->UpdateRegFamiliarCdno($data);
    return  response()->json(["resp" => "1"]);
}

public function instMiembroNoCedulado(Request $data){
    $idgrupofamilia = lara_groupfamilia::where('cedulajefe',$data['cedulajefe'])->value('cod_familia');
    $data['cod_familia']= $idgrupofamilia;
    $this->NewMiembroFamily($data);
    $this->insertRegCdnoFamily($data);
    return  response()->json(["resp" => "1"]);
}

public function instMiembroCedulado(Request $data){
    $idgrupofamilia = lara_groupfamilia::where('cedulajefe',$data['cedulajefe'])->value('cod_familia');
    $data['cod_familia']= $idgrupofamilia;
    $this->NewMiembroFamily($data);
    $this->UpdateRegFamiliarCdno($data); 
    return  response()->json(["resp" => "1"]);
}




public function validaCedulaFamilia(Request $data){
    $miembroduplicado = lara_groupfamilia::where('cedulaindividuo',$data['cedulaindividuo'])->count();
    $jefedulicado = lara_groupfamilia::where('cedulajefe',$data['cedulaindividuo'])->count();
    return response()->json(["miembroduplicado"=> $miembroduplicado,
        'jefeduplicado'=> $jefedulicado]);
}





public function GetListarJefeFamily(Request $data){

    $sql_string = "SELECT
    lara_regcdno.id,
    lara_regcdno.CodEdo,
    lara_regcdno.CodMun,
    lara_regcdno.CodPaq,
    lara_regcdno.NacElector,
    lara_regcdno.CedulaCdno,
    lara_regcdno.NombreCdno,
    lara_regcdno.FechaNacCdno,
    lara_regcdno.EstadoCivilCdno,
    lara_regcdno.SexoCdno,
    lara_regcdno.CodCentro,
    lara_regcdno.MesaElector,
    lara_regcdno.BigDataCorreo,
    lara_regcdno.BigDataTwiter,
    lara_regcdno.BigDataFacebook,
    lara_regcdno.BigDataInstagram,
    lara_regcdno.TelMovilPpal,
    lara_regcdno.`TelMovil-01`,
    lara_regcdno.`TelMovil-02`,
    lara_regcdno.TelResidencial,
    lara_regcdno.DireccionCdno,
    lara_regcdno.NoResidenciaCdno,
    lara_regcdno.EdadCdno,
    lara_regcdno.CodCarnetPatria,
    lara_regcdno.SerialCarnetPatria,
    lara_regcdno.RegCarnetPatria,
    lara_regcdno.RegHogaresPatria,
    lara_regcdno.RegPatriActualizado,
    lara_regcdno.RegJoseGregorioHernandez,
    lara_regcdno.RegMilitantePsuv,
    lara_regcdno.RegResponsableUbch,
    lara_regcdno.PsuvUbchCargo,
    lara_regcdno.PsuvUbchCod,
    lara_regcdno.jefedefamilia,
    lara_regcdno.PsuvCodCirculo,
    lara_regcdno.FuncionarioPublico,
    lara_regcdno.EntePublico,
    lara_regcdno.RegAltoNivelyDir,
    lara_regcdno.RegAutoridadEstadal,
    lara_regcdno.RegAutoridadMunicipal,
    lara_regcdno.RegAutoridadNacional,
    lara_regcdno.CargoAutoridad,
    lara_regcdno.RegAdultoMayor,
    lara_regcdno.ActAmorMayor,
    lara_regcdno.BeneficiarioClap,
    lara_regcdno.RegDiversidadFuncional,
    lara_regcdno.RegEmbarazada,
    lara_regcdno.RegPartoHumanizado,
    lara_regcdno.RegPatologiaCronica,
    lara_regcdno.Reg0800Ayuda,
    lara_regcdno.Trabaja,
    lara_regcdno.Estudia,
    lara_regcdno.ViviendaPropia,
    lara_regcdno.ViviendaTipoRancho,
    lara_regcdno.CodNucleoFamiliar,
    lara_regcdno.VoltPorVzla,
    lara_regcdno.CodRegCasaXCasa,
    lara_regcdno.MenorEdad,
    lara_regcdno.folio,
    lara_regcdno.noPartida,
    lara_regcdno.created_at,
    lara_regcdno.updated_at,
    lara_groupfamilia.cod_familia,
    lara_groupfamilia.tipo,
    lara_groupfamilia.casaRef
    FROM
    lara_regcdno
    INNER JOIN lara_groupfamilia ON lara_groupfamilia.cedulajefe = lara_regcdno.CedulaCdno
    WHERE
    lara_groupfamilia.tipo = 1 AND
    lara_groupfamilia.cod_calle = '". $data['cod_manzana'] . "'";    
    $resp = DB::select($sql_string);

    return response()->json($resp);

}



public function GetListarFamily(Request $data){

    $sql_string = "SELECT
    lara_regcdno.CedulaCdno,
    lara_regcdno.NombreCdno,
    lara_regcdno.TelMovilPpal,
    lara_groupfamilia.cod_familia,
    lara_groupfamilia.id
FROM
lara_groupfamilia
INNER JOIN lara_regcdno ON lara_regcdno.CedulaCdno = lara_groupfamilia.cedulaindividuo
WHERE
    lara_groupfamilia.cod_familia ='". $data['cod_familia'] . "'";    
    $resp = DB::select($sql_string);

    return response()->json($resp);

}















public function getJefeFamilia(Request $data){

    $sql_string = "SELECT
    lara_regcdno.id,
    lara_regcdno.CodEdo,
    lara_regcdno.CodMun,
    lara_regcdno.CodPaq,
    lara_regcdno.NacElector,
    lara_regcdno.CedulaCdno,
    lara_regcdno.NombreCdno,
    lara_regcdno.FechaNacCdno,
    lara_regcdno.EstadoCivilCdno,
    lara_regcdno.SexoCdno,
    lara_regcdno.CodCentro,
    lara_regcdno.MesaElector,
    lara_regcdno.BigDataCorreo,
    lara_regcdno.BigDataTwiter,
    lara_regcdno.BigDataFacebook,
    lara_regcdno.BigDataInstagram,
    lara_regcdno.TelMovilPpal,
    lara_regcdno.`TelMovil-01`,
    lara_regcdno.`TelMovil-02`,
    lara_regcdno.TelResidencial,
    lara_regcdno.DireccionCdno,
    lara_regcdno.NoResidenciaCdno,
    lara_regcdno.EdadCdno,
    lara_regcdno.CodCarnetPatria,
    lara_regcdno.SerialCarnetPatria,
    lara_regcdno.RegCarnetPatria,
    lara_regcdno.RegHogaresPatria,
    lara_regcdno.RegPatriActualizado,
    lara_regcdno.RegJoseGregorioHernandez,
    lara_regcdno.RegMilitantePsuv,
    lara_regcdno.RegResponsableUbch,
    lara_regcdno.PsuvUbchCargo,
    lara_regcdno.PsuvUbchCod,
    lara_regcdno.jefedefamilia,
    lara_regcdno.PsuvCodCirculo,
    lara_regcdno.FuncionarioPublico,
    lara_regcdno.EntePublico,
    lara_regcdno.RegAltoNivelyDir,
    lara_regcdno.RegAutoridadEstadal,
    lara_regcdno.RegAutoridadMunicipal,
    lara_regcdno.RegAutoridadNacional,
    lara_regcdno.CargoAutoridad,
    lara_regcdno.RegAdultoMayor,
    lara_regcdno.ActAmorMayor,
    lara_regcdno.BeneficiarioClap,
    lara_regcdno.RegDiversidadFuncional,
    lara_regcdno.RegEmbarazada,
    lara_regcdno.RegPartoHumanizado,
    lara_regcdno.RegPatologiaCronica,
    lara_regcdno.Reg0800Ayuda,
    lara_regcdno.Trabaja,
    lara_regcdno.Estudia,
    lara_regcdno.ViviendaPropia,
    lara_regcdno.ViviendaTipoRancho,
    lara_regcdno.CodNucleoFamiliar,
    lara_regcdno.VoltPorVzla,
    lara_regcdno.CodRegCasaXCasa,
    lara_regcdno.MenorEdad,
    lara_regcdno.folio,
    lara_regcdno.noPartida,
    lara_regcdno.created_at,
    lara_regcdno.updated_at,
    lara_groupfamilia.casaRef,
    lara_groupfamilia.cod_familia
    FROM
    lara_regcdno
    INNER JOIN lara_groupfamilia ON lara_groupfamilia.cedulaindividuo = lara_regcdno.CedulaCdno
    WHERE
    lara_regcdno.id = ". $data['id'];    
    $resp = DB::select($sql_string);
    return response()->json($resp);

}





















}
