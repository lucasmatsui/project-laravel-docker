<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;
use App\Services\CriadorDeSerie;
use App\Services\RemovedorDeSerie;
use App\Http\Requests\SeriesFormRequest;

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
    

  public function store(
    SeriesFormRequest $request,
    CriadorDeSerie $criadorDeSerie
  ) {

    $serie = $criadorDeSerie->criarSerie(
      $request->nome,
		  $request->qt_temporadas, 
		  $request->ep_por_temporada
    );

    $request->session()
      ->flash(
        "msg", 
        "Série {$serie->id} criada com sucesso: {$serie->nome}"
      );

    return redirect()->route('listar_series');
  }

  public function destroy(
    Request $request,
    RemovedorDeSerie $removedorDeSerie
  ) {

    $serie = $removedorDeSerie->removerSerie($request->id);
    
    $request->session()
      ->flash(
        "msg", 
        "Série $serie removida com sucesso!"
    );

    return redirect()->route('listar_series');
  }


}