<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class RegisterController extends Controller
{
    public function register(){
        return view('admin/users/register',[
            'title'=>'Register'
        ]);
    }
    public function  Acregister(Request $req){
        //dd(Hash::make($req->password));
        $this->validate($req,[
            'email'=>'required|email:filter',
            'password'=>'required'
        ]);
        $req->merge(['password'=>Hash::make($req->password)]);
        //dd($req->all());
        try {
            User::create($req->all());
        }catch (\Throwable $th){
            dd($th);
        }
        return redirect()->route('login')->with('message','Dang Ki thanh cong');
    }
}
