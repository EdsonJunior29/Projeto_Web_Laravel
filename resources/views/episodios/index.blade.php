@extends('layout')

@section('cabecalho')
Episódios
@endsection

@section('conteudo')

if(!empty($mesagem))
<div class="alert alert-success">
    {{$mesagem}}
</div>
@endif
<form action="/temporadas/{{ $temporadaId }}/episodios/assistir" method="post">
    @csrf
    <ul class="list-group">
        @foreach($episodios as $episodio)
        <li class="list-group-item d-flex justify-content-between align-items-center">
            Episódio {{$episodio->numero}}
            <input type="checkbox" nome="episodios[]" value="{{$episodio->id}}" {{ $episodio->assistido ? 'checked' : ''}}>
        </li>
        @endforeach
    </ul>
    <button class="btn btn-primary mt-2 mb-2">Salvar</button>
</form>
@endsection
