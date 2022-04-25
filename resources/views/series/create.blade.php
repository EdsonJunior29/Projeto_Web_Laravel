@extends('layout')

@section('cabecalho')
Adicionar Séries
@endsection

@section('conteudo')
<form method="post">
    <div class="form-group">
        <label for="InputName" class="form-label">Nome</label>
        <input type="email" class="form-control mb-2" id="InputName" placeholder="Nome">
    </div>
    <button class="btn btn-primary">Adicionar</button>

</form>
@endsection
