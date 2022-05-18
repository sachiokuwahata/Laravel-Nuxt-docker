<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TestAPIContoller extends Controller
{
    public function hello(Request $request) {

        $word = "helloGet";
        return response()->json($word);
    }    
}
