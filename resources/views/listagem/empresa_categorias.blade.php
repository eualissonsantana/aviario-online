@extends('layouts.app')

@section('content')
    
    <div class="container col-md-8 col-12">
        <h2>Lista de Categorias de empresa</h2>
        <hr>
        @csrf
        @foreach ($categorias as $cat)
            <div class="row">
                <div class="col-9">
                    <h5><strong>ID - </strong>  {{$cat->id}} </h5>
                    <h5><strong>Descrição:</strong>  {{$cat->descricao}} </h5>
                </div>
                <div class="col">
                    <a href="{{url("painel/empresas/categorias/$cat->id/edit")}}">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                    <a href="{{url("painel/empresas/categorias/$cat->id")}}" class="js-del-emp-cat">
                        <button class="btn btn-danger">Excluir</button>
                    </a>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection