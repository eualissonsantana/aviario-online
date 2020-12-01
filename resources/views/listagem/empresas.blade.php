@extends('layouts.app')

@section('content')
    <section class="container-fluid content-child painel-empresas">
        <article class="row px-3 justify-content-between ">
            <div class="">
                <h2>Comércios</h2>
            </div>
            
            <section class="row col-10 justify-content-end mt-2">
                <div class="mr-2 busca-categoria">
                    <div class="input-group">
                        <form class="form-inline my-2 my-lg-0" action="{{route('empresas.search')}}" method="POST">
                            @csrf
                            <div class="input-group-prepend">
                                <button class="btn btn-busca-categoria" type="button submit">O</button>
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

                <div class="busca-nome">
                    <form class="form-inline my-2 my-lg-0" action="{{route('empresas.search')}}" method="POST">
                        @csrf
                        <input type="text" hidden="true" name="option" value="nome">
                        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar por uma parte do nome" name="filter" aria-label="Search">
                        <button hidden="true" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
    
                <a href="{{route("empresas.create")}}">
                    <button class="btn btn-cadastrar">Novo</button>
                </a>
            </section>

        </article>
        <hr>

        
        @csrf
        @foreach ($empresas as $emp)
            <section class="row">
                <article class="col-2 imagem-comercio">
                    <img src="{{ url('storage/imagens/empresas/'.$emp->imagem) }}" style="max-width: 175px " />
                </article>
                <article class="col-8 dados-comercio">
                    <article class="mb-3">
                        <h6>{{$emp->categoria->descricao}}</h6>
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
                    
                </article>
                <article class="col-2 row justify-content-end">
                    <a href="{{url("painel/empresas/$emp->id/edit")}}">
                        <button class="btn btn-editar">Editar</button>
                    </a>
                    <a href="{{url("painel/empresas/$emp->id")}}" class="ml-2 js-del-emp">
                        <button class="btn btn-excluir">Excluir</button>
                    </a>
                </article>
            </section>
            <hr>
        @endforeach
    </section>
@endsection