<?php

namespace App\Http\Controllers;

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

    public function store(Request $request)
    {
        $serie = Serie::create($request->all());

        return redirect('/series')->with('mensagem', 'Serie cadastrada com sucesso!');
    }

    public function destroy(Request $request)
    {
        Serie::destroy($request->id);
        return redirect('/series')->with('mensagem', 'Serie removida com sucesso!');
    }
}
