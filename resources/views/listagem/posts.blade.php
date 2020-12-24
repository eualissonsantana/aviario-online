@extends('layouts.app')

@section('content')    
<div class="painel-noticias">
    <div class="row justify-content-between titulo">
        <div class="col-6 col-md-6  mt-md-2">
            <h2>Notícias</h2>
        </div>
        <div class="col-6 col-md-6 row text-right">
            <div class="col-8 busca-nome d-none d-sm-block">
                <form class="form-inline" action="{{route('posts.search')}}" method="POST">
                    @csrf
                    <input type="text" hidden="true" name="option" value="titulo">
                    <input class="form-control " type="search" placeholder="Pesquisar por uma parte do nome" name="filter" aria-label="Search">
                    <button hidden="true" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>
            <div class="col-4">
                <a href="{{route("posts.create")}}">
                    <button class="btn btn-lg btn-novo">Nova</button>
                </a>
            </div>


           
        </div>
    </div>
    
    <hr>
            
            <section class="row busca-box col-md-8 col-sm-12 justify-content-end mt-2 px-0">
                <div class="col-sm-12 col-md-3 mr-2 busca-categoria px-0 d-none d-sm-block">
                    <div class="input-group">
                        <form class="form-inline my-2 my-lg-0" action="{{route('posts.search')}}" method="POST">
                            @csrf
                            <div class="input-group-prepend">
                                <button class=" btn-busca-categoria" type="button submit">O</button>
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

                <div class="col-sm-12 col-md-5 busca-nome px-0 d-none d-sm-block">
                    <form class="form-inline my-2 my-lg-0" action="{{route('posts.search')}}" method="POST">
                        @csrf
                        <input type="text" hidden="true" name="option" value="titulo">
                        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar por uma parte do nome" name="filter" aria-label="Search">
                        <button hidden="true" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
                <div class="col-sm-12 col-md-1 px-0 justify-content-end">
                    <a href="{{route("posts.create")}}">
                        <button class="btn btn-cadastrar">Nova</button>
                    </a>
                </div>
            </section>
            <hr class="col-sm-11 col-md-12">
        </article>
        @csrf

        <ul>
            @foreach ($posts as $post)
                <li> 
                    <section class="row li-noticia justify-content-between px-md-3">
                        <article class="col-4 col-xs-4 col-md-3 col-xl-2 imagem-noticia px-0">
                            <img src="{{ url('storage/imagens/chamadas/'.$post->imagem) }}"/> 
                        </article>
                        <article class="col-8 col-xs-7 col-sm-7 col-md-7 col-xl-8 pl-4 align-content-between flex-wrap titulo-noticia">    
                            <div class="col-12">
                                <h6> {{$post->categoria->descricao}} </h6>
                                <h4 class="">{{$post->titulo}} </h4>
                            </div>
                            <div class="col-12 d-none d-sm-block previa">
                                <p>{{$post->previa}}</p>
                            </div>
                            <div class="col-12">
                                <p> {{$post->created_at}} </p>
                            </div>
                        </article>

                        <article class="botoes col-md-2 col-12 row justify-content-end mt-3 mt-md-0 px-0">
                            <a href="{{url("painel/noticias/$post->id/edit")}}">
                                <button class="btn btn-editar">Editar</button>
                            </a>
                            <a href="{{url("painel/noticias/$post->id")}}" class="ml-md-3 js-del-post">
                                <button class="btn btn-excluir">Excluir</button>
                            </a>
                        </article>
                        <hr class="col-11 col-md-12">
                    </section>
                </li>
            @endforeach
        </ul>
    </section>
@endsection