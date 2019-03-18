<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function profile()
    {
        $user = Auth::user();

        return view('perfil.index', compact('user', $user));
    }

    public function update_avatar(Request $request)
    {


        $this->validate($request, [
            'avatar' => '|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'dir' => 'required',
            'tele_ppal' => 'required'
        ]);


        $user = Auth::user();

        if ($request->hasFile('avatar')) {
            $avatarName = $user->username . '-avatar-' . time() . '.' . request()->avatar->getClientOriginalExtension();
            $request->avatar->storeAs('avatars', $avatarName);
            $user->avatar = $avatarName;
        }
        $user->email = $request->email;
        $user->dir = $request->dir;
        $user->tele_ppal = $request->tele_ppal;

        $user->save();

        return back()
            ->with('success', 'You have successfully upload image.');
    }
}
