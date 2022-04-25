@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')
<a href="/series/criar" type="button" class="btn btn-secondary mb-2">Adicionar</a>
<ul class="list-group">
    @foreach($series as $serie)
    <li class="list-group-item"><?= $serie; ?></li>
    @endforeach

</ul>
@endsection
