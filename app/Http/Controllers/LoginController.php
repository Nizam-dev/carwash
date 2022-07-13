<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class LoginController extends Controller
{
    public function index()
    {
        if(Auth::check()){
            return redirect('dashboard');
        }
        return view('login');
    }

    public function login(Request $request)
    {
        $request->validate([
            "email"=>'required',
            "password"=>'required',
        ]);

        $user = User::where('email',$request->email)->first();
        if(!$user){
            return redirect()->back()->with('gagal','Email Tidak ditemukan');
        }

        if(Auth::attempt(["email"=>$request->email,"password"=>$request->password])){
            return redirect('dashboard');
        }
        return redirect()->back()->with('gagal','Password Salah');

    }
}
