<?php

namespace App\Http\Controllers;

use App\Serie;
use Illuminate\Http\Request;
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
    

  public function store(SeriesFormRequest $request)
  {

    $serie = Serie::create(['nome' => $request->nome]);
    $qt_temporadas = $request->qt_temporadas;
    $ep_por_temporada = $request->ep_por_temporada;

    for ($i=1; $i <= $qt_temporadas ; $i++) { 
      $temporada = $serie->temporadas()->create(['numero' => $i]);

      for ($j=1; $j <= $ep_por_temporada ; $j++) {
        $temporada->episodios()->create(['numero' => $j]);
      }
    }


    $request->session()
      ->flash(
        "msg", 
        "Série {$serie->id} criada com sucesso: {$serie->nome}"
      );

    return redirect()->route('listar_series');
  }

  public function destroy(Request $request)
  {
    Serie::destroy($request->id);
    $request->session()
      ->flash(
        "msg", 
        "Série  removida com sucesso!"
    );

    return redirect()->route('listar_series');
  }


}