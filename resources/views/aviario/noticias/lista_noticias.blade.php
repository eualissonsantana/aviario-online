@extends('layouts.app')

@section('content')    
    <section class="aviario-noticias padding-padrao pt">
        <article>
            <div>
                <h2>Notícias</h2>
            </div>
        </article>

        <hr>
        @csrf
        <section class="card mb-4 shadow-sm" id="card-swipe">
            <div class="swipeView p-2 ">
                @foreach ($categorias as $cat)
                    <div class="opcao  px-3 py-2">
                        <form class="" action="{{route('posts.search')}}" method="POST">
                            @csrf
                            <div class="input-group-prepend">
                                <button class="btn btn-categoria" type="button submit">
                                    <p class="mb-0 text-center">
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
                @endforeach
            </div>

        </section>
        <article class="row justify-content-between">
            <div class="col-12 col-md-7 lista-noticias">
                <ul>
                    @foreach ($posts as $post)
                        <li> 
                            <a href="{{route('posts.show', ['slug' => $post->slug, 'id' => $post->id])}}">
                                <section class="row li-noticia justify-content-between px-md-3">
                                    <article class="col-6 col-md-4 imagem-noticia pr-0 px-md-0">
                                        <img src="{{ url('public/storage/imagens/chamadas/'.$post->imagem) }}"/> 
                                    </article>
                                    <article class="col-6 col-md-8 d-flex align-content-between flex-wrap titulo-noticia">    
                                        <div class="col-12 px-0 px-md-3">
                                            <h6> {{$post->categoria->descricao}} </h6>
                                            <h4 class="">{{$post->titulo}} </h4>
                                        </div>
                                        <div class="col-12 d-none d-sm-block previa">
                                            <p>{{$post->previa}}</p>
                                        </div>
                                        <div class="col-12 px-0 px-md-3">
                                            <p> {{$post->created_at}} </p>
                                        </div>
                                    </article>                  
                                </section>
                            </a>
                        </li>
                        <hr>
                    @endforeach
                </ul>
            </div>
            <div class="col-2 d-none d-sm-block">
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
            <div class="col-3 anuncios-laterais d-none d-sm-block">
                <div class="col-12 anuncio px-0 mb-5">
                    <img src="{{ url('img/lateral-1.png/') }}" />
                </div>
                <div class="col-12 anuncio px-0 mb-5">
                    <img src="{{ url('img/lateral-2.jpg/') }}" />
                </div>
                <div class="col-12 anuncio px-0 mb-5">
                    <img src="{{ url('img/lateral-1.png/') }}" />
                </div>
            </div>
    
        </article>
        


        
    </section>
@endsection