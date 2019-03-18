<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;


class adminController extends Controller
{



    public function indexUser()
    {
        $usuarios = Auth::user()->all();

        return view('admin.user', compact('usuarios'));
    }
}
