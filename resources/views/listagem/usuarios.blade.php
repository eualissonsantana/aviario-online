@extends('layouts.app')

@section('content')
    <div class="container col-8">
        <h2>Lista de usuários</h2>
        <hr>
        @csrf
        @foreach ($usuarios as $user)
            <div class="row">
                <div class="col-10">
                    <h5><strong>Nome:</strong>  {{$user->name}} </h5>
                    <h5><strong>Username:</strong>  {{$user->username}} </h5>
                    <hr>
                </div>
                <div class="col">
                    <a href="{{url("users/$user->id/edit")}}">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                    <a href="{{url("users/$user->id")}}" class="js-del">
                        <button class="btn btn-danger">Excluir</button>
                    </a>
                </div>
            </div>
        @endforeach
    </div>
@endsection