<?php

namespace App\services;

use App\Models\Episodio;
use App\Models\Temporada;
use App\Serie;
use Illuminate\Support\Facades\DB;

class RemoverSeries
{
    public function removerSerie(int $serieId): string
    {
        $nomeDaSerie = '';
        DB::transaction(function () use ($serieId, &$nomeDaSerie) {
            $serie = Serie::find($serieId);
            $nomeDaSerie = $serie->nome;

            $this->removerSerieETemporadas($serie);
        });

        return $nomeDaSerie;
    }

    public function removerSerieETemporadas($serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerTemporada($temporada);
        });
        $serie->delete();
    }

    public function removerTemporada(Temporada $temporada): void
    {
        $temporada->episodios->each(function (Episodio $episodio) {
            $episodio->delete();
        });
        $temporada->delete();
    }
}
