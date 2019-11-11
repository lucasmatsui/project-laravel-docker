<?php

namespace Tests\Feature;

use App\Serie;
use App\Services\CriadorDeSerie;
use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\DB;

class CriadorDeSerieTest extends TestCase
{
    public function testCriarSerie()
    {
        $criadorDeSerie = new CriadorDeSerie();
        $nomeSerie = 'Nome de teste';

        DB::beginTransaction();
        $serieCriada = $criadorDeSerie->criarSerie($nomeSerie, 1, 1);

        $this->assertInstanceOf(Serie::class, $serieCriada);
        $this->assertDatabaseHas('series', ['nome' => $nomeSerie]);
        $this->assertDatabaseHas('temporadas', ['serie_id' => $serieCriada->id, 'numero'=> 1]);
        $this->assertDatabaseHas('episodios', ['numero'=> 1]);
        DB::rollback();
    }
}
