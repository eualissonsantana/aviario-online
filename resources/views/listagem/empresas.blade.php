@extends('layouts.app')

@section('content')
    
    <div class="container col-md-10 col-12">
        <h2>Lista de empresas</h2>
        <hr>
        @csrf
        @foreach ($empresas as $emp)
            <div class="row">
                <div class="col-2">
                    <img src="{{ url('storage/imagens/empresas/'.$emp->imagem) }}" style="max-width: 200px " />
                </div>
                <div class="col-6 ml-4">
                    <h3><strong>{{$emp->nome}}</strong> </h3>
                    <h5>{{$emp->slogan}} </h5>
                    <h5><strong>Endereco:</strong>  {{$emp->endereco->bairro}} </h5>
                    <h5><strong>Ramo:</strong>  {{$emp->categoria->descricao}} </h5>
                </div>
                <div class="col">
                    <a href="{{url("empresas/$emp->id/edit")}}">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                    <a href="{{url("empresas/$emp->id")}}" class="js-del-emp">
                        <button class="btn btn-danger">Excluir</button>
                    </a>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection