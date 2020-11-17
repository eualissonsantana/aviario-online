@extends('layouts.app')

@section('content')
    
    <div class="container col-md-8 col-12">
        <h2>Lista de usuários</h2>
        <hr>
        @csrf
        @foreach ($usuarios as $user)
            <div class="row">
                <div class="col-9">
                    <h5><strong>Nome:</strong>  {{$user->name}} </h5>
                    <h5><strong>Username:</strong>  {{$user->username}} </h5>
                </div>
                <div class="col">
                    <a href="{{url("users/$user->id/edit")}}">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                    <a href="{{url("users/$user->id")}}" class="js-del-user">
                        <button class="btn btn-danger">Excluir</button>
                    </a>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection