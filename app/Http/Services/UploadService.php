<?php

namespace App\Http\Services;

use mysql_xdevapi\Exception;

class UploadService
{
    public function store($request)
    {

        if ($request->hasFile('file')){
            $request->file('file')->store('uploads');

            try {
                $name = $request -> file('file')->getClientOriginalName();
                $x = 'uploads/'.date("y/n/d/");
                $request->file('file')->storeAs('public/'.$x. $name);
                return '/storage/'. $x.'/'.$name;
            }catch (\Exception $error){
                return false;
            }
        }
    }

}
