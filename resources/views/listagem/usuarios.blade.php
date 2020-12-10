@extends('layouts.app')

@section('content')
    
    <div class="content-child usuarios">
        <div class="row justify-content-between px-md-3">
            <div class="col-xs-12 col-md-11 px-0">
                <h2>Usuários</h2>
            </div>
            <div class="botao-cadastrar col-sm-12 col-md-1 align-content-end px-0">
                <a href="{{route("users.create")}}" class="px-0">
                    <button class="btn btn-cadastrar">Novo</button>
                </a>
            </div>
            <hr class="col-sm-11 col-md-12">
        </div>
        
        @csrf
        <table class="d-none d-sm-block mt-4 table table-hover table-md ">
            <thead class="thead-light">
              <tr>
                <th scope="col">Nome</th>
                <th scope="col" >Username</th>
                <th scope="col" ></th>
                <th scope="col" ></th>
              </tr>
            </thead>
            <tbody>
                @foreach ($usuarios as $user)
                <tr>
                    <td>{{$user->name}}</td>
                    <td>{{$user->username}}</td>
                    <td>
                        <a href="{{url("painel/users/$user->id/edit")}}">
                            <button class="btn btn-editar">Editar</button>
                        </a>
                    </td>
                    <td>
                        <a href="{{url("painel/users/$user->id")}}" class="js-del-user">
                            <button class="btn btn-excluir">Excluir</button>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>

        <ul class="d-block d-sm-none lista-usuarios">
            @foreach ($usuarios as $user)
                <li>
                    <div class="row">
                        <div class="col-12 px-0">
                            <h6>nome</h6>
                            <h4> {{$user->name}} </h4>
                        </div>
                        <div class="col-12 mt-2 px-0">
                            <h6>username</h6>
                            <h4> {{$user->username}} </h4>
                        </div>
                    </div>
                    <div class="row justify-content-between mt-3">
                        <div>
                            <a href="{{url("painel/users/$user->id/edit")}}">
                                <button class="btn btn-editar">Editar</button>
                            </a>
                        </div>
                        <div>
                            <a href="{{url("painel/users/$user->id")}}" class="js-del-user">
                                <button class="btn btn-excluir">Excluir</button>
                            </a>
                        </div>
                        <hr class="col-11 ">
                    </div>
                </li>
            @endforeach
        </ul>
    </div>
    <hr>
    </div>
@endsection