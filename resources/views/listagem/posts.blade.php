@extends('layouts.app')

@section('content')    
<div class="painel-noticias">
    <div class="row justify-content-between titulo">
        <div class="col-8 col-md-6 mt-md-2">
            <h2>Notícias</h2>
        </div>
        <div class="col-4 col-md-6 text-right">
            <a href="{{route("posts.create")}}">
                <button class="btn btn-lg btn-novo">Nova</button>
            </a>
        </div>
    </div>
    
    <hr>

    <article class="row justify-content-between">
        <div class="col-12 col-md-8 lista-noticias">
            <ul>
                @foreach ($posts as $post)
                    <li> 
                        <section class="row li-noticia justify-content-between px-md-3">
                            <article class="col-5 col-md-3 imagem-noticia px-0">
                                <img src="{{ url('storage/imagens/chamadas/'.$post->imagem) }}"/> 
                            </article>
                            <article class="col-7 col-md-5 titulo-noticia">    
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
    
                            <article class="row botoes col-12 col-md-4 justify-content-end pr-3 pr-md-5">
                                <a href="{{url("painel/noticias/$post->id/edit")}}">
                                    <button class="btn btn-sm btn-editar">Editar</button>
                                </a>
                                <a href="{{url("painel/noticias/$post->id")}}" class="ml-md-3 js-del-post">
                                    <button class="btn btn-sm btn-excluir">Excluir</button>
                                </a>
                            </article>
                        </section>
                    </li>
                    <hr >
                @endforeach
            </ul>
        </div>
        <div class="col-3 d-none d-sm-block">
            <div class="mb-3 busca-nome d-none d-sm-block">
                <form class="form-inline" action="{{route('posts.search')}}" method="POST">
                    @csrf
                    <input type="text" hidden="true" name="option" value="titulo">
                    <input class="form-control " type="search" placeholder="Pesquisar por uma parte do nome" name="filter" aria-label="Search">
                    <button hidden="true" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>

            <div class="accordion ramos-categorias" id="accordionExample">
                <div class="card">
                    <div class="card-header titulo-categoria text-left">
                        <h3>Categorias</h3>
                    </div>
                </div>
                @foreach ($categorias as $cat)
                    <div class="card">
                        <div class="card-header"> 
                            <form class="form-inline" action="{{route('posts.search')}}" method="POST">
                                @csrf
                                <div class="input-group-prepend">
                                    <button class="btn btn-categoria" type="button submit">
                                        <p class="mb-0 text-left">
                                            <strong>
                                                {{$cat->descricao}}
                                            </strong>
                                        </p>
                                    </button>
                                </div>
                                
                                <input class="form-control" type="search" hidden="true" name="filter" value="{{$cat->id}}" aria-label="Search">
                                <input type="text" hidden="true" name="option" value="categoria">
                            </form>
                            
                        </div>
                    </div>    
                @endforeach
            </div> 	
        </div>

    </article>
    
            
      
        @csrf

        
    </section>
@endsection