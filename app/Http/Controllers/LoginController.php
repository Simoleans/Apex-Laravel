<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index()
    {
        return view('dashboard');
    }

    public function login(Request $request)
    {
        /*----------- LOGIN MANUAL , MODIFICABLE ----------*/
        $this->validate($request, [
            'email'    => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($request->only(['email', 'password']))) {
            return redirect()->intended('dashboard');
        } else {
            return redirect()->route('login')->withErrors('¡Error! , Revise sus credenciales');
        }
    }
}
