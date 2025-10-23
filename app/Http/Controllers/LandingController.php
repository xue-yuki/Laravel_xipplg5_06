<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class LandingController extends Controller
{
    public function index() // index = nama funcion untuk di panggil 
    {
        return view('landing');
    }
}
