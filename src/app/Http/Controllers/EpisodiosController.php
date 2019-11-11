<?php

namespace App\Http\Controllers;

use App\Episodio;
use App\Temporada;
use Illuminate\Http\Request;

class EpisodiosController extends Controller
{
    public function index(Temporada $temporada, Request $request)
    {
        return view('episodios.index', [
            'episodios' => $temporada->episodios,
            'temporadaId' => $temporada->id,
            'msg' => $request->session()->get('msg')
        ]);
    }

    public function assistir(Temporada $temporada, Request $request)
    {
        $request->validate([
            'episodios' => 'required',
        ]);
    

        $episodiosAssistidos = $request->episodios;
        $temporada->episodios->each(function(Episodio $episodio) use($episodiosAssistidos) {
            $episodio->assistido = \in_array($episodio->id, $episodiosAssistidos);
        });
        $temporada->push();
        
        $request->session()->flash('msg', 'Episódios marcados como assistidos!');

        return redirect()->back();
    }
}
