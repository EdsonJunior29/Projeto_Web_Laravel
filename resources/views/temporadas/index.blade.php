@extends('layout')

@section('cabecalho')
Temporadas de {{$serie ->nome}}
@endsection

@section('conteudo')
<ul class="list-group">
    @foreach($temporadas as $temporada)
    <li class="list-group-item d-flex justify-content-between">
        <a href="/temporadas/{{$temporada->id}}/episodios"> Temporada {{ $temporada->numero }}</a>
        <span class="badge-secondary">
            0 / {{ $temporada->episodios->count() }}
        </span>
    </li>
    @endforeach
</ul>
@endsection
