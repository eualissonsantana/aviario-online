@extends('layouts.app')

@section('content')
    
    <div class="content-child usuarios">
        <div class="row px-3 justify-content-between ">
            <h2>Usuários</h2>
            <a href="{{route("users.create")}}">
                <button class="btn btn-cadastrar">Novo</button>
            </a>
        </div>
        @csrf
        <table class="mt-4 table table-hover table-md">
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
        </div>
    </div>
    <hr>
    </div>
@endsection