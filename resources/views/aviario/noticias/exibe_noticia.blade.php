@extends('layouts.app')

@section('content')
    <section class="exibe-noticia pt padding-padrao">
        <div class="d-block d-sm-none banners-topo mb-3">
            <div id="carouselExampleControls" class="carousel slide carousel-mobile" data-ride="carousel" >
                <div class="carousel-inner">
                    @if(isset($bannersRetangulares))
                        @foreach ($bannersRetangulares as $banner)
                            <div class="carousel-item carousel-mobile-item">
                                <img class="d-block w-100" src="{{ url('public/storage/imagens/banners/'.$banner->imagem) }}" alt="{{$banner->titulo}}">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>

        <section class="row justify-content-between">
            <article class="col-md-9 col-12">
                <h6> {{$post->categoria->descricao}} </h6>
                <h2> {{$post->titulo}} </h2>
                <p class="mt-3"> {{$post->previa}} </p>
                <hr class="mt-4">
                <p>Postado em {{$post->created_at}} </p>
                <div class="imagem-noticia conteudo my-3">
                    <img src="{{ url('public/storage/imagens/chamadas/'.$post->imagem) }}"/> 
               
                    <p class="text-justify">
                        {!! $post->conteudo !!}
                    </p>

                    <div class="mt-5 mb-4">
                        <h4>Autor: {{$post->user->name}} </h4>
                        <hr>
                    </div>
                </div>

                <div class="comentarios">
                    <p class="deixe-comentario mb-4">
                        Deixe o seu comentário
                    </p>
                    
                    <div class="px-0 fb-comments" data-href="https://10.0.0.120:8000/noticias/{{$post->id}}" data-numposts="5" data-width="100%">
                    </div>
                </div>
            </article>

            <article class="col-md-3 anuncios-laterais d-none d-sm-block">
                @foreach ($bannersQuadrados as $banner)
                    <div class="col-12 anuncio px-0 mb-5">
                        <img src="{{ url('storage/imagens/banners/'.$banner->imagem) }}" />
                    </div>    
                @endforeach
            </article>

            <div class="col-12 mt-3 anuncio d-block d-sm-none">
                <div id="carouselExampleControls" class="carousel slide bottom-carousel-mobile" data-ride="carousel" >
                    <div class="carousel-inner">
                        @if(isset($bannersQuadrados))
                            @foreach ($bannersQuadrados as $banner)
                                <div class="carousel-item bottom-carousel-mobile-item">
                                    <img class="d-block w-100" src="{{ url('storage/imagens/banners/'.$banner->imagem) }}" alt="{{$banner->titulo}}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
        
    </section>
@endsection