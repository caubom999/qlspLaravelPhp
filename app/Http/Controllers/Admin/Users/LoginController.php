<?php

namespace App\Http\Controllers\Admin\Users;

use App\Http\Controllers\Controller;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session as FacadesSession;

class LoginController extends Controller
{
    public function index(){
        return view('admin.users.login',['title'=>'LogIn']);
    }


    public  function  store(Request $request)
    {

        $this -> validate($request , [
            'email'=>'required|email:filter',
            'password'=>'required'
        ]);
        //kiem tra nhap dung pass thi login vao trang
        if(Auth::attempt([
            'email'=> $request -> input('email'),
            'password'=> $request -> input("password")
        ],$request->input('remember'))){
            return redirect()-> route('admin');
        }

       //kiem tra xem nhap sai pass thi thong bao
        \Illuminate\Support\Facades\Session::flash('error','Ban da nhap sai email or pass');

        return redirect()-> back();
    }
}
