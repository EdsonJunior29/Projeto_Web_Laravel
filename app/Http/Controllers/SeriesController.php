<?php

namespace App\Http\Controllers;

use App\Events\NovaSerie;
use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\services\CriarSeries;
use App\services\RemoverSeries;
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


    public function store(SeriesFormRequest $request, CriarSeries $criarSeries)
    {

        dd($request->file('capa')->store('serie'));

        $serie = $criarSeries->criarSerie(
            $request->nome,
            $request->temporadas,
            $request->episodios,
            $request->capa
        );

        $newEvent = new NovaSerie(
            $request->nome,
            $request->temporadas,
            $request->episodios
        );

        event($newEvent);

        return redirect()->route('Lista_series')->with('mensagem', 'Serie, temporadas e episódios cadastrados com sucesso!');
    }

    public function destroy(Request $request, RemoverSeries $removerSeries)
    {
        $nomeSeries = $removerSeries->removerSerie($request->id);
        return redirect('/series')->with('mensagem', 'Serie removida com sucesso!');
    }

    public function editaNome(int $id, Request $request)
    {
        $serie = Serie::find($id);
        $novoNome = $request->nome;
        $serie->nome = $novoNome;
        $serie->save();
    }
}
