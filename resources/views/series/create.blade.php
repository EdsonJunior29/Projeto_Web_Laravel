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
        <div class="row">
            <div class="col col-8">
                <label for="nome" class="form-label">Nome</label>
                <input type="text" class="form-control" id="nome" name="nome">
            </div>
            <div class="col col-2">
                <label for="temporadas" class="form-label">Temporadas</label>
                <input type="number" class="form-control" id="temporadas" name="temporadas">
            </div>
            <div class="col col-2">
                <label for="episodios" class="form-label">Episódios</label>
                <input type="number" class="form-control" id="episodios" name="episodios">
            </div>
        </div>
        <div class="row">
            <div class=" col col-12">
                <label for="nome" class="form-label">Capa</label>
                <input type="file" class="form-control" id="capa" name="capa">
            </div>
        </div>
        <button class="btn btn-primary mt-2">Adicionar</button>

    </form>
@endsection
