<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login(){
        return view('login');
    }

    public function validasi(Request $req){
        $credentials = $req->validate(
            ['username'=>'required', 'password'=>'required'],
            ['username.required'=>'Username wajib diisi', 'password.required'=>'Password wajib diisi']
        );

        if(Auth::attempt($credentials)){
            if(Auth::user()->level=='admin'){
                return redirect()->intended('/');
            }
            return redirect()->intended('/');
        }
        return back()->withErrors('Username dan Password salah')->withInput();
    }

    public function logout(){
        Auth::logout();
        return redirect('/login');
    }
}
