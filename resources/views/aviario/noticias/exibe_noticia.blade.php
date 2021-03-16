@extends('layouts.app')
@section('title')
    {{$post->titulo}} - Aviário Online
@stop

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
                <div class="date-post">
                    <p > Postada em {{date('j \d\e M \à\s  H:i\h', strtotime($post->created_at))}} </p>
                </div>
                <div class="conteudo my-3">
                    <div class="imagem-noticia">
                        <img src="{{ url('public/storage/imagens/chamadas/'.$post->imagem) }}"/> 
                        @section('og-image')
                            {{ url('public/storage/imagens/chamadas/'.$post->imagem) }}
                        @stop
                    </div>
               
                    <p class="text-justify">
                        {!! $post->conteudo !!}
                    </p>

                    <div class="mt-5 mb-4 autor">
                        <h4>Autor: {{$post->autor}} </h4>
                        <hr>
                    </div>
                </div>

                <div class="comentarios">
                    <p class="deixe-comentario mb-4">
                        Deixe o seu comentário
                    </p>
                    
                    <div class="px-0 fb-comments" data-href="https://aviario.online/noticias/{{$post->slug}}/{{$post->id}}" data-numposts="5" data-width="100%">
                    </div>
                </div>
            </article>

            <article class="col-md-3 anuncios-laterais d-none d-sm-block">
                <div id="carouselExampleControls" class="carousel slide carousel-quadrado" data-ride="carousel" >
                    <div class="carousel-inner">
                        @if(isset($bannersQuadrados))
                            @foreach ($bannersQuadrados as $banner)
                                <div class="carousel-item carousel-quadrado-item">
                                    <img class="d-block w-100" src="{{ url('public/storage/imagens/banners/'.$banner->imagem) }}" alt="{{$banner->titulo}}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </article>

            <div class="col-12 mt-3 anuncio d-block d-sm-none">
                <div id="carouselExampleControls" class="carousel slide bottom-carousel-mobile" data-ride="carousel" >
                    <div class="carousel-inner">
                        @if(isset($bannersQuadrados))
                            @foreach ($bannersQuadrados as $banner)
                                <div class="carousel-item bottom-carousel-mobile-item">
                                    <img class="d-block w-100" src="{{ url('public/storage/imagens/banners/'.$banner->imagem) }}" alt="{{$banner->titulo}}">
                                </div>
                            @endforeach
                        @endif
                    </div>
                </div>
            </div>
        </section>
        
    </section>
@endsection