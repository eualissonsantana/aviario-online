@extends('layouts.app')

@section('content')
    
    <div class="container col-md-8 col-12">
        <h2>Lista de usuários</h2>
        <hr>
        @csrf
        @foreach ($empresas as $emp)
            <div class="row">
                <div class="col-9">
                    <h5><strong>Nome:</strong>  {{$emp->nome}} </h5>
                    <h5><strong>Slogan:</strong>  {{$emp->slogan}} </h5>
                </div>
                <div class="col">
                    <a href="{{url("users/$emp->id/edit")}}">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                    <a href="{{url("users/$emp->id")}}" class="js-del">
                        <button class="btn btn-danger">Excluir</button>
                    </a>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection