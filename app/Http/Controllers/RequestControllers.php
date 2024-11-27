<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RequestControllers extends Controller
{
    function search(Request $request)
    {

       // dd($_POST, $request->all());
        return redirect()->route('home',['request' => $request->search]);
    }
}
