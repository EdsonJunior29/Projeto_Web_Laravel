<?php

namespace App\services;

use App\Serie;

class CriarSeries
{
    public function criarSerie(string $nomeDaSerie, int $qtdTemporadas, int $qtdEpisodios): Serie
    {

        $serie = Serie::create(['nome' => $nomeDaSerie]);
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' =>  $i]);
            for ($j = 1; $j <= $qtdEpisodios; $j++) {
                $temporada->episodios()->create(['numero' => $j]);
            }
        }

        return $serie;
    }
}
