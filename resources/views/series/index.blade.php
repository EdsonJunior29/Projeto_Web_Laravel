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

<a href="/series/criar" type="button" class="btn btn-secondary mb-2">Adicionar</a>
<ul class="list-group">
    @foreach($series as $serie)
    <li class="list-group-item">{{ $serie->nome }} </li>
    @endforeach

</ul>
@endsection
