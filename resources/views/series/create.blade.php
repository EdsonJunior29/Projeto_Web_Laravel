@extends('layout')

@section('cabecalho')
Adicionar Séries
@endsection

@section('conteudo')
@if ($errors->any())
<div class="alert alert-danger">
    <ul>
        @foreach ($errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
<form method="post">
    @csrf
    <div class="form-group">
        <label for="nome" class="form-label">Nome</label>
        <input type="text" class="form-control mb-2" id="nome" placeholder="Nome" name="nome">
    </div>
    <button class="btn btn-primary">Adicionar</button>

</form>
@endsection
