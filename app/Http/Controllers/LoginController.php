<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    public function view(){
        return view('auth.login');
    }

    public function login(Request $request){
         $request->validate([
            'username' => ['required', 'string','exists:tab_usuari,cedula_usu'],
            'password' => ['required'],
        ]);

        $user = User::where('cedula_usu', $request->username)->first();
        if (Hash::check($request->password,$user->clave_usu)) {
            Auth::login($user);

            return redirect()->route('home');
        }

        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout(){
        Auth::logout();

        return redirect()->route('login');
    }
}
