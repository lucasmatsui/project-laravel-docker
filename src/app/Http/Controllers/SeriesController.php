<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{
  public function index(Request $request)
  {
    $data = array();

    $series = Serie::query()
      ->orderBy('nome')
      ->get();

    $msg = $request->session()->get('msg');

    $data['series'] = $series;
    $data['msg'] = $msg;

    return view('series.index', $data);
  }
  
  public function create()
  {
    return view('series.create');
  }

  public function store(Request $request)
  {
    $nome = $request->nome;

    $serie = Serie::create([
      'nome' => $nome
    ]);

    $request->session()
      ->flash(
        "msg", 
        "Série {$serie->id} criada com sucesso: {$serie->nome}"
      );

    return redirect('/series');
  }


}