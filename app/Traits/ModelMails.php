<?php

namespace App\Traits;

use Mail;

trait ModelMails{

    public function Sendvalidatemail($data){


        Mail::send('emails.confirmation_code', $data, function($message) use ($data) {
            $message->to($data['email'], $data['name'])->subject('Por favor confirma tu correo');
        });
    }

}