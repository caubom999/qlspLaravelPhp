<?php

namespace App\Http\Services;

class TestService
{
    public function store($request)
    {

        if ($request->hasFile('file')) {
            $request->file('file')->store('uploads');
        }

    }
}
