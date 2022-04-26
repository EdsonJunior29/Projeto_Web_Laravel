<?php

namespace App\Http\Controllers;

use App\Http\Requests\SeriesFormRequest;
use App\Serie;
use App\services\CriarSeries;
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
        $serie = $criarSeries->criarSerie(
            $request->nome,
            $request->temporadas,
            $request->episodios
        );
        return redirect()->route('Lista_series')->with('mensagem', 'Serie, temporadas e episódios cadastrados com sucesso!');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        return redirect('/series')->with('mensagem', 'Serie removida com sucesso!');
    }
}
