<?php

namespace App\Services;

use App\Serie;
use App\Temporada;
use Illuminate\Support\Facades\DB;

class CriadorDeSerie
{
	public function criarSerie(
		string $nomeSerie, 
		int $qt_temporadas, 
		int $ep_por_temporada
  	): Serie 
  	{	
		DB::beginTransaction();
		try{
			$serie = Serie::create(['nome' => $nomeSerie]);
			$this->adicionarTemporadas($serie, $qt_temporadas, $ep_por_temporada);
			DB::commit();
		}catch(\Exception $e){
			DB::rollback();
		}
			
    	return $serie;
	}

	private function adicionarTemporadas(
		Serie $serie, 
		$qt_temporadas, 
		$ep_por_temporada
	):void
	{
		for ($i=1; $i <= $qt_temporadas ; $i++) { 
			$temporada = $serie->temporadas()->create(['numero' => $i]);
			$this->adicionarEpisodios($temporada, $ep_por_temporada);
    	}
	}

	private function adicionarEpisodios(
		Temporada $temporada, 
		$ep_por_temporada
	):void
	{
		for ($j=1; $j <= $ep_por_temporada ; $j++) {
			$temporada->episodios()->create(['numero' => $j]);
		}
	}

}