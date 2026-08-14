<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller {

    public function index(){

        return view('login');
    }

    public function authenticated(Request $request) {

        $credentials = $request->validate([
            'email'=> 'required|email',
            'password'=> 'required|min:6',
        ]);

        if(Auth::attempt($credentials)){
            $request->session()->regenerate();
            return redirect() -> intended('/');
        }else {
            return back()->withErrors([
                'email' => 'Credenciais invalidas',
            ]);
        }

    }

}
