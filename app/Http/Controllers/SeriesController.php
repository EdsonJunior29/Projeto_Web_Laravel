<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use Illuminate\Http\Request;

class SeriesController extends Controller
{

    public function index(Request $request)
    {
        $series = Serie::query()->orderBy('nome')->get();
        $mensagem = $request->session()->get('mensagem');

        return view('series.index', compact('series', 'mensagem'));
    }

    public function create()
    {
        return view('series.create');
    }

    public function store(SeriesFormRequest $request)
    {
        $serie = Serie::create(['nome' => $request->nome]);
        $qtdTemporadas = $request->temporadas;
        for ($i = 1; $i <= $qtdTemporadas; $i++) {
            $temporada = $serie->temporadas()->create(['numero' =>  $i]);
            $qtdEpisodios = $request->episodios;
            for ($j = 1; $j <= $qtdEpisodios; $j++) {
                $temporada->episodios()->create(['numero' => $j]);
            }
        }
        return redirect()->route('Lista_series')->with('mensagem', 'Serie, temporadas e episódios cadastrados com sucesso!');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        return redirect('/series')->with('mensagem', 'Serie removida com sucesso!');
    }
}
