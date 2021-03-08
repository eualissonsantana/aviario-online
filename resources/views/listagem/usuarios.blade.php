@extends('layouts.app')
@section('title')
    Usuários - Aviário Online
@stop
@section('content')  
    <div class="painel-usuarios pt padding-padrao">
        <div class="row justify-content-between titulo">
            <div class="col-6 col-md-9 mt-md-2">
                <h2>Usuários</h2>
            </div>
            <div class="col-6 col-md-3 text-right">
                <a href="{{route("users.create")}}">
                    <button class="btn btn-lg btn-novo">Novo</button>
                </a>
            </div>
        </div>
        
        <hr>
        @csrf
        <section class="usuario-cards">
            <article class="row">
                @foreach ($usuarios as $user)
                    <div class="col-md-3 col-sm-12 ">
                        <article class="av-card av-card-no-scale mt-3">
                            <div class="av-card-body">
                                <div>
                                    <h5>Nome</h5>
                                    <h5 class="thin">{{$user->name}}</h5>
                                </div>
                                <div class="username">
                                    <h5>Username</h5>
                                    <h5 class="thin">{{$user->username}}</h5>
                                </div>
                                <div class="row justify-content-center botoes">
                                    <div class="col-md-5 pl-0">
                                        <a href="{{url("painel/usuarios/$user->id/edit")}}">
                                            <button class="btn btn-full btn-primary">Editar</button>
                                        </a>
                                    </div>
                                    <div class="col-md-5 pr-0 text-right">
                                        <a href="{{url("painel/usuarios/$user->id")}}" class="js-del-user">
                                            <button class="btn btn-full btn-danger">Excluir</button>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </article>
                    </div>
                @endforeach
            </article>
        </section>
        
    </div>
@endsection