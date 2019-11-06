<?php

namespace App\Services;

use App\Serie;
use App\Episodio;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class RemovedorDeSerie
{
    public function removerSerie(int $id): string
    {
        $nomeSerie = '';

        DB::transaction(function () use($id, &$nomeSerie) {
            $serie = Serie::find($id);
            $nomeSerie = $serie->nome;
            
            $this->removerTemporadas($serie);
            $serie->delete();
        });

        return $nomeSerie;
    }

    private function removerTemporadas(Serie $serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada){
            $this->removerEpisodios($temporada);
        });
        $temporada->delete();
    }

    private function removerEpisodios(Temporada $temporada): void
    {
        $temporada->episodios->each(function (Episodio $episodio){
            $episodio->delete();
        });
    }
}