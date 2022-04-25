@extends('layout')

@section('cabecalho')
Séries
@endsection

@section('conteudo')
<a href="/series/criar" type="button" class="btn btn-secondary mb-2">Adicionar</a>
<ul class="list-group">
    <?php
    foreach ($series as $serie) : ?>
        <li class="list-group-item"><?= $serie; ?></li>
    <?php endforeach; ?>

</ul>
@endsection
