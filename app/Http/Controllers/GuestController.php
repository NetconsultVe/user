<?php

namespace App\Http\Controllers;
use App\User;

use Illuminate\Http\Request;

class GuestController extends Controller
{

    public function verify($code)
        {
            $user = User::where('email_token', $code)->first();
           

            if (! $user)
                return redirect('/');

            $user->verified = 1;
            $user->active = 1;
            $user->email_token = null;
            $user->save();

            return redirect('/home')->with('notification', 'Has confirmado correctamente tu correo!');
        }
}
