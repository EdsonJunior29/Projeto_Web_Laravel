<?php

namespace App\Listeners;

use App\Events\ExcluirSeries;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Storage as FacadesStorage;

class ExcluirCapaSerie
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  \App\Events\ExcluirSeries  $event
     * @return void
     */
    public function handle(ExcluirSeries $event)
    {
        $serie = $event->serie;
        if ($serie->capa) {
            FacadesStorage::delete($serie->capa);
        }
    }
}
