<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Services\TestService;
use App\Http\Services\UploadService;
use Illuminate\Http\Request;

class TestController extends Controller
{
    protected $upload;
    public function __construct(TestService $upload)
    {
        $this->upload = $upload;
    }

    public function index(){
        return view('admin.test',[
            'title'=>'upload'
            ]);
    }

    public function store(Request $request)
    {
        $this->upload->store($request);
    }
}
