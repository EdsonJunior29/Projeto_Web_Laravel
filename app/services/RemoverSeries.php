<?php

namespace App\services;

use App\Models\Episodio;
use App\Models\Temporada;
use App\Serie;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class RemoverSeries
{
    public function removerSerie(int $serieId): string
    {
        $nomeDaSerie = '';
        DB::transaction(function () use ($serieId, &$nomeDaSerie) {
            $serie = Serie::find($serieId);
            $nomeDaSerie = $serie->nome;

            $this->removerTemporadas($serie);
            $serie->delete();

            if ($serie->capa) {
                FacadesStorage::delete($serie->capa);
            }
        });


        return $nomeDaSerie;
    }

    private function removerTemporadas(Serie $serie): void
    {
        $serie->temporadas->each(function (Temporada $temporada) {
            $this->removerEpisodio($temporada);
            $temporada->delete();
        });
    }

    private function removerEpisodio(Temporada $temporada): void
    {
        $temporada->episodios->each(function (Episodio $episodio) {
            $episodio->delete();
        });
    }
}
