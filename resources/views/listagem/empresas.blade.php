@extends('layouts.app')

@section('content')
    <section class="content-child painel-empresas px-0">
        <article class="row px-md-3 justify-content-between ">
            <div class="">
                <h2>Comércios</h2>
            </div>
            
            <section class="m-auto row col-md-10 col-sm-12 justify-content-end mt-2 px-0">
                <div class="mr-2 busca-categoria d-none d-sm-block">
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

                <div class="busca-nome d-none d-sm-block">
                    <form class="form-inline my-2 my-lg-0" action="{{route('empresas.search')}}" method="POST">
                        @csrf
                        <input type="text" hidden="true" name="option" value="nome">
                        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar por uma parte do nome" name="filter" aria-label="Search">
                        <button hidden="true" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
    
                <div class="col-sm-12 col-md-1 justify-content-end px-0">
                    <a href="{{route("empresas.create")}}">
                        <button class="btn btn-cadastrar">Novo</button>
                    </a>
                </div>
            </section>
            <hr class="col-sm-11 col-md-12">
        </article>

        
        @csrf
        <ul>
            @foreach ($empresas as $emp)
                <li>
                    <section class="row justify-content-between">
                        <article class="col-4 col-md-2 col-lg-2 col-xl-2 imagem-comercio px-0">
                            <img src="{{ url('storage/imagens/empresas/logomarcas/'.$emp->imagem) }}" />
                        </article>

                        <article class="col-7 col-md-8 dados-comercio px-0">
                            <article class="mb-3">
                                <h6>{{$emp->categoria->descricao}}</h6>
                                <h3><strong>{{$emp->nome}}</strong></h3>
                                <h5 class="d-none d-sm-block">{{$emp->slogan}} </h5>
                            </article>
                            <article class="mb-3">
                                <p>
                                    {{$emp->endereco->logradouro}}, {{$emp->endereco->numero}} <br> 
                                    {{$emp->endereco->bairro}} - Feira de Santana/BA
                                </p>
                            </article>
                            <article class="telefone">
                                <h5>{{$emp->telefone}}</h5>
                            </article>
                            
                        </article>

                        <article class="botoes col-md-2 col-12 row mt-3 px-0">
                            <a href="{{url("painel/empresas/$emp->id/edit")}}">
                                <button class="btn btn-editar">Editar</button>
                            </a>
                            <a href="{{url("painel/empresas/$emp->id")}}" class="ml-2 js-del-emp">
                                <button class="btn btn-excluir">Excluir</button>
                            </a>
                        </article>
                        <hr class="col-sm-11 col-md-12">
                    </section>
                </li>
            @endforeach
        </ul>

        <div class="container">
            {{ $empresas->links() }}
        </div>
    </section>
@endsection