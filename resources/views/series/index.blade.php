@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')
@if(!empty($mensagem))
<div class="alert alert-success">
    <p>{{session('mensagem')}}</p>
</div>
@endif

<a href="{{ route('form_criar_serie') }}" type="button" class="btn btn-secondary mb-2">Adicionar</a>
<ul class="list-group">
    @foreach($series as $serie)
    <li class="list-group-item  d-flex justify-content-between align-items-center">{{ $serie->nome }}
        <span class="d-flex ">
            <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm mr-1">temporadas</a>
            <form method="post" action="/series/{{ $serie->id }}" onsubmit="return confirm('Deseja escluir a série {{ addslashes($serie->nome)}}')">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger">Excluir</button>
            </form>
        </span>
    </li>
    @endforeach

</ul>
@endsection
