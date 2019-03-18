<?php

namespace App\Http\Controllers;

use DB;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use App\lara_regComunidades;
use App\lara_regmanzana;
use App\Traits\ModelMails;
use App\Traits\UserTraits;
use App\Traits\CdnoTraits;
use App\Traits\UbchTraits;
use Mail;


class AutoUsuarioController extends Controller
{
    use ModelMails;
    use UserTraits;
    use CdnoTraits;
    use UbchTraits;

    function validaemail(Request $data){
        return $this->ValidaMailCdno($data);
     }

     
    function addUser(Request $data){
        $mailExist = DB::table('users')->where('email', $data['email'])->count();
        if($mailExist == 0) { 
            $data["password"] = str_random(6);  
            $data['email_token'] = str_random(25);
            $user = $this->RegisterUser($data);
            // Send confirmation code
            // $this->Sendvalidatemail($user);   
            // Mail::send('emails.confirmation_code', $data, function($message) use ($data) {
            //     $message->to($data['email'], $data['name'])->subject('Por favor confirma tu correo');
            // });         
        } else 
        {
            $user = $this->UpdateUser($data);
        };
        $this->UpdateMailTelePpalCdno($data);
        $this->UpdateJefeUbch($data);
        return response()->json(["resp"=> '1']);      
    }
    


// funcion de la comundad nueva comunidad

    function addUserComuniti(Request $data){        
        $IdUbch = DB::table('psuv_ubch')->where('CodUBCH', $data['cod_ubch'])->value('id_ubch'); 
        $corelativo = DB::table('psuv_ubch')->where('CodUBCH', $data['cod_ubch'])->value('NoComunidad') + 1;
        $respRgdCdno = DB::table('psuv_ubch')->where('CodUBCH',$data['cod_ubch'])->update([
            'NoComunidad' => $corelativo
        ]);

        $LaraCodComunidad = '11-'.$data['cod_mud'].'-'.$data['cod_pq'].'-'.$data['cod_ubch'].'-'.$corelativo;
        $data["cod_comun"] = $LaraCodComunidad;


        

        $Insertcomunidad = lara_regComunidades::create([
            'cne_GepMp' => $data['cod_mud'],
            'cne_GoePq' => $data['cod_pq'],
            'cne_CodCentro' => $data['cod_ubch'],
            'LaraCodComunidad' => $LaraCodComunidad,
            'LaraRespComunidad' => $data['cedula'],               
            'id_ubch' =>  $IdUbch,
            'LaraNameComunidad' => $data['nameComuniti'],
            'LaraDirComunidad' => $data['dirUbch']                
            ]);
            
        $mailExist = DB::table('users')->where('email', $data['email'])->count();
        if($mailExist == 0) { 
            $data["password"] = str_random(6);  
            $data['email_token'] = str_random(25);
            $user = $this->RegisterUser($data);
            // Send confirmation code
            // $this->Sendvalidatemail($data); 
            // Mail::send('emails.confirmation_code', $data, function($message) use ($data) {
            //     $message->to($data['email'], $data['name'])->subject('Por favor confirma tu correo');
            // });

        } else 
        {
            $user = $this->UpdateUser($data);
        };
        $this->UpdateMailTelePpalCdno($data);
        $this->UpdateJefeUbch($data);
        return response()->json(["resp"=> '1']);      
    }




    // funciòn que actualiza la comunidad
function updUserComuniti(Request $data){           
    $this->UpdateMailTelePpalCdno($data);
    $this-> UpdateComunidad($data);
    $mailExist = DB::table('users')->where('email', $data['email'])->count();
        if($mailExist == 0) { 
            $data["password"] = str_random(6);  
            $data['email_token'] = str_random(25);
            $user = $this->RegisterUser($data);
            // Send confirmation code
            // $this->Sendvalidatemail($data);            
        } else 
        {
            $user = $this->UpdateUser($data);
        };
        return response()->json(["resp"=> '1']);   
}

// fin de la funciòn

function addUserCalle(Request $data){ 
           
        $id__Comunidad = DB::table('lara_regcomunidades')->where('LaraCodComunidad', $data['cod_comuniti'])->value('id'); 
        $corelativo = DB::table('lara_regcomunidades')->where('LaraCodComunidad', $data['cod_comuniti'])->value('NoManzanas') + 1;
        $cod_manzana = $data['cod_comuniti'].'-'.$corelativo;
        $data['cod_manzana']= $cod_manzana;
        $data['correlativo']= $corelativo  ;
        DB::table('lara_regcomunidades')->where('LaraCodComunidad',$data['cod_comuniti'])->update([
            'NoManzanas' => $data['correlativo']
            ]);
            
        $InsertManzana = lara_regmanzana::create([
            'cne_GepMp' => $data['cod_mud'],
            'cne_GoePq' => $data['cod_pq'],
            'cne_CodCentro' => $data['cod_ubch'],
            'LaraCodComunidad'=> $data['cod_comuniti'],
            'LaraCodManzana'=> $cod_manzana,
            'NameManzana'=> $data['NameManzana'],
            'LaraRespManzana' => $data['cedula'],   
            'id_Comunidad' => $id__Comunidad,
            'ServAguaPotable' => $data['ServAguaPotable'],   
            'ServGas' => $data['ServGas'],   
            'Electricidad' => $data['Electricidad'],   
            'TransportePublico'  => $data['TransportePublico'],   
            'AguasServidas' => $data['AguasServidas'],   
            'Telefono' => $data['Telefono'],   
            'Internet' => $data['Internet'],   
            'Vialidad' => $data['Vialidad']     
            
            ]);
           $this->UpdateMailTelePpalCdno($data);         
            $data['cod_manzana']= "99";
            $mailExist = DB::table('users')->where('email', $data['email'])->count();
            if($mailExist == 0) { 
                $data["password"] = str_random(6);  
                $data['email_token'] = str_random(25);
                $user = $this->RegisterUser($data);
                // Send confirmation code
                // $this->Sendvalidatemail($data);            
            } else 
            {
                $user = $this->UpdateUser($data);
            };
        return response()->json(["resp"=> '1']);
}

function upUserCalle(Request $data){           
    $this->UpdateMailTelePpalCdno($data);
    $this-> UpdateCalle($data);

    $mailExist = DB::table('users')->where('email', $data['email'])->count();
        if($mailExist == 0) { 
            $data["password"] = str_random(6);  
            $data['email_token'] = str_random(25);
            $user = $this->RegisterUser($data);
            // Send confirmation code
            // $this->Sendvalidatemail($data); 
            // Mail::send('emails.confirmation_code', $data, function($message) use ($data) {
            //     $message->to($data['email'], $data['name'])->subject('Por favor confirma tu correo');
            // });           
        } else 
        {
            $user = $this->UpdateUser($data);
        };
        return response()->json(["resp"=> '1']);   
}



}
