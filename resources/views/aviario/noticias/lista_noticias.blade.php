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
        <section class="card mb-4 px-2 pt-3 shadow-sm d-block d-sm-none text-center" id="card-swipe">
            <div class="swipeView">
                @foreach ($categorias as $cat)
                    <div class="opcao">
                        <form class="pb-3" action="{{route('posts.search')}}" method="POST">
                            @csrf
                            <div class="">
                                <button class="btn-categoria" onclick="defineActive(this)" type="button submit">
                                    <p class="categoria-swipe"  >
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
        <article class="row justify-content-between listagem-noticias">
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
                                            <p> {{date('j \d\e M \à\s  H:i\h', strtotime($post->created_at))}} </p>
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
                <div class="mb-3 busca-nome ">
                    <form class="" action="{{route('aviario.posts.search')}}" method="POST">
                        @csrf
                        <div class="area-procura-noticia">
                            <input type="text" hidden="true" name="option" value="titulo">
                            <input class="procura-noticia" type="text" name="filter" placeholder="Procurar notícia" aria-label="Search">
                            <button><i type="submit" class="fas fa-search"></i></button>
                        </div>
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
                                <a class="form-inline" href="{{route('posts.categoria', $cat->slug)}}" >
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
                                </a>
                                
                            </div>
                        </div>    
                    @endforeach
                </div> 	
            </div>
            <div class="col-3 anuncios-laterais d-none d-sm-block">
                @foreach ($bannersQuadrados as $banner)
                    <div class="col-12 anuncio px-0 mb-5">
                        <img src="{{ url('storage/imagens/banners/'.$banner->imagem) }}" />
                    </div>    
                @endforeach
            </div>
    
        </article>
        


        
    </section>
@endsection