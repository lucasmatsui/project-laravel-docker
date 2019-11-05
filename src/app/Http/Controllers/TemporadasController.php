<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class TemporadasController extends Controller
{
    public function index($id)
    {
        $temporadas = Serie::find($id)->temporadas();
        

        return view('temporadas.index', compact('temporadas'));        
    }
}
