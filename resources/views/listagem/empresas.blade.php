@extends('layouts.app')

@section('content')
    
    <section class="content-child">
        <article class="row px-3 justify-content-between ">
            <h2>Comércios</h2>
            <a href="{{route("empresas.create")}}">
                <button class="btn btn-cadastrar">Novo Comércio</button>
            </a>
        </article>
        <hr>

        <article class="row px-3 mb-3 justify-content-between">
            <div>
                <div class="input-group">
                    <form class="form-inline my-2 my-lg-0" action="{{route('empresas.search')}}" method="POST">
                        @csrf
                        <div class="input-group-prepend">
                            <button class="btn btn-outline-secondary" type="button submit">Filtrar por categoria</button>
                        </div>
                        <select class="custom-select" id="inputGroupSelect03" name="filter">
                            @foreach($categorias as $cat)
                                <option value="{{$cat->id}}">{{$cat->descricao}}</option>
                            @endforeach
                        </select>
                        <input type="text" hidden="true" name="option" value="categoria">
                    </form>
                </div>
            </div>
            <div>
                <form class="form-inline my-2 my-lg-0" action="{{route('empresas.search')}}" method="POST">
                    @csrf
                    <input type="text" hidden="true" name="option" value="nome">
                    <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar" name="filter" aria-label="Search">
                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
        </article>
        <hr>
        @csrf
        @foreach ($empresas as $emp)
            <section class="row">
                <section class="col-2 imagem-comercio">
                    <img src="{{ url('storage/imagens/empresas/'.$emp->imagem) }}" style="max-width: 175px " />
                </section>
                <section class="col-8 dados-comercio">
                    <article class="mb-3">
                        <small><strong>{{$emp->categoria->descricao}}</strong></small>
                        <h3><strong>{{$emp->nome}}</strong></h3>
                        <h5>{{$emp->slogan}} </h5>
                    </article>
                    <article class="mb-3">
                        <p>
                            {{$emp->endereco->rua}}, {{$emp->endereco->numero}} <br> 
                            {{$emp->endereco->bairro}} - {{$emp->endereco->cep}} - {{$emp->endereco->cidade}}/{{$emp->endereco->estado}}
                        </p>
                    </article>
                    <article class="telefone">
                        <h5>{{$emp->telefone}}</h5>
                    </article>
                    
                </section>
                <div class="col">
                    <a href="{{url("empresas/$emp->id/edit")}}">
                        <button class="btn btn-editar">Editar</button>
                    </a>
                    <a href="{{url("empresas/$emp->id")}}" class="js-del-emp">
                        <button class="btn btn-excluir">Excluir</button>
                    </a>
                </div>
            </section>
            <hr>
        @endforeach
    </section>
@endsection