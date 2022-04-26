<?php

namespace App\services;

use App\Models\Temporada;
use App\Serie;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class CriarSeries
{
    public function criarSerie(string $nomeDaSerie, int $qtdTemporadas, int $qtdEpisodios): Serie
    {

        $serie = new Serie();
        DB::transaction(function () use ($nomeDaSerie, $qtdTemporadas, $qtdEpisodios, &$serie) {
            $serie = Serie::create(['nome' => $nomeDaSerie]);
            $this->criarTemporadas($qtdTemporadas, $qtdEpisodios, $serie);
        });

        return $serie;
    }

    private function criarTemporadas(int $qtdTemporada, int $epPorTemporada, Serie $serie): void
    {
        for ($i = 1; $i <= $qtdTemporada; $i++) {
            $temporada = $serie->temporadas()->create(['numero' =>  $i]);
            $this->criarEpisodios($epPorTemporada, $temporada);
        }
    }


    private function criarEpisodios(int $qtsEpisodios, Model $temporada): void
    {
        for ($i = 1; $i <= $qtsEpisodios; $i++) {
            $temporada->episodios()->create(['numero' => $i]);
        }
    }
}
