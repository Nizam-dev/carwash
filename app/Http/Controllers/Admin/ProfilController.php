<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class ProfilController extends Controller
{
    public function index()
    {
        return view('admin.profil');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email'=>'required',
            'name'=>'required',
        ]);

        $user = [
            'name'=>$request->name,
            'email'=>$request->email,
        ];
        if($request->password != null){
            $user["password"] = bcrypt($request->password);
        }


        User::find(auth()->user()->id)->update($user);

        return redirect()->back()->with('sukses','Profil Berhasil Diubah');

    }
}
