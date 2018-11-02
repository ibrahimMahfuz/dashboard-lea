<?php

namespace App\Http\Controllers;

use App\Asisten;
use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class LoadCOntroller extends Controller
{
    public function index(){
        $asisten = Asisten::all();
        return response()->json($asisten);
    }
}
