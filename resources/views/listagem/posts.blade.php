@extends('layouts.app')

@section('content')    
    <section class="content-child painel-noticias">
        <article class="row px-md-3 justify-content-between px-0">
            <div class="">
                <h2>Notícias</h2>
            </div>
            
            <section class="row col-md-8 col-sm-12 justify-content-end mt-2 px-0">
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

                <div class="col-sm-12 col-md-5 busca-nome px-0">
                    <form class="form-inline my-2 my-lg-0" action="{{route('posts.search')}}" method="POST">
                        @csrf
                        <input type="text" hidden="true" name="option" value="titulo">
                        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar por uma parte do nome" name="filter" aria-label="Search">
                        <button hidden="true" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
                <div class="col-sm-12 col-md-3 px-0">
                    <a href="{{route("posts.create")}}">
                        <button class="btn btn-cadastrar">Novo</button>
                    </a>
                </div>
            </section>
            <hr class="col-11 ">
        </article>
        
        @csrf
        @foreach ($posts as $post)
            <section class="row justify-content-between pr-3">
                <article class="col-2 imagem-noticia">
                    <img src="{{ url('storage/imagens/chamadas/'.$post->imagem) }}"/> 
                </article>
                <article class="col-7 row align-content-between flex-wrap">
                    
                    <div class="col-12">
                        <h6> {{$post->categoria->descricao}} </h6>
                        <h4 class="">{{$post->titulo}} </h4>

                    </div>
                    <div class="col-12 previa">
                        <p>{{$post->previa}}</p>
                    </div>
                    <div class="col-12">
                        <p> {{$post->created_at}} </p>
                    </div>
                </article>
                <article class="botoes col-2 row justify-content-end">
                    <a href="{{url("painel/noticias/$post->id/edit")}}">
                        <button class="btn btn-editar">Editar</button>
                    </a>
                    <a href="{{url("painel/noticias/$post->id")}}" class="ml-2 js-del-post">
                        <button class="btn btn-excluir">Excluir</button>
                    </a>
                </article>
            </section>
            <hr>
        @endforeach
    </section>
@endsection