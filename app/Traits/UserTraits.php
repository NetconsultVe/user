<?php

namespace App\Traits;

use App\User;
use DB;
use Mail;

trait UserTraits{

    public function RegisterUser($data){
        $user = User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'email_token' => $data['email_token'],
            'username' => $data['username'],
            'id_nivel' => $data['id_nivel'],
            'tele_ppal' => $data['tele_ppal'],
            'cod_ubch' => $data['cod_ubch'],
            'cod_mp' => $data['cod_mud'],
            'cod_pq' => $data['cod_pq'],
            'cod_comun' => $data['cod_comun'],
            'cod_manzana' => $data['cod_manzana'],
            'cod_familia' => $data['cod_familia'],
            'tele_ppal' => $data['tele_ppal'],
            'dir'=> $data['dir'],
        ]);




        // $dataMail = ['foo' => 'baz'];

        // Mail::send(['name' => $name], $data, function ($message) use ($name, $imie, $nazwisko, $email, $password) {
        //         $message->from('us@example.com', 'System Magazyn');
        //         $message->attach('Your temporary password: '.['password' => $password]);
        //         $message->to(['email'=>$email])->subject('Rejestracja Magazyn');
        
        //     });




        $dataMail = ['url' => $user['email_token'],
                    'name' => $user['name'],
                    'user' =>$user['email'],
                    'password' => $data['password'],
                        
                    ];

        Mail::send('emails.confirmation_code', $dataMail, function($message) use ($user) {
            $message->to($user['email'], $user['name'])->subject('Por favor confirma tu correo');
        }); 

        return $user;

    }


    public function UpdateUser($data){
        return DB::table('users')->where('email', $data['email'])->update([
            'cod_ubch' => $data['cod_ubch'],
            'cod_mp' => $data['cod_mud'],
            'cod_pq' => $data['cod_pq'],
            'cod_comun' => $data['cod_comun'],
            'cod_manzana' => $data['cod_manzana'],
            'cod_familia' => $data['cod_familia'],
            'dir'=> $data['dir']
        ]);

    }




//fin del traits
}