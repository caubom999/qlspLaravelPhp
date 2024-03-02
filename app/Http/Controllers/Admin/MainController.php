<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use http\Env\Request;

class MainController extends Controller
{
    public function index(){
        return view('admin.home',[
            'title'=>'Trang Quan Tri ADMIN'
        ]);
    }
}
