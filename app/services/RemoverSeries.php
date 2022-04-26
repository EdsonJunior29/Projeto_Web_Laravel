<?php

namespace App\services;

use App\Models\Episodio;
use App\Models\Temporada;
use App\Serie;

class RemoverSeries
{
    public function removerSerie(int $serieId): string
    {
        $serie = Serie::find($serieId);
        $nomeDaSerie = $serie->nome;
        $serie->temporadas->each(function (Temporada $temporada) {
            $temporada->episodios->each(function (Episodio $episodio) {
                $episodio->delete();
            });
            $temporada->delete();
        });
        $serie->delete();

        return $nomeDaSerie;
    }
}
