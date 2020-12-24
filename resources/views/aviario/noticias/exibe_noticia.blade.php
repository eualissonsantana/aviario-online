@extends('layouts.app')

@section('content')
    <section class="content-child exibe-noticia">
        <p></p>
        <section class="row justify-content-between">
            <article class="col-md-9 col-12">
                <h3> {{$post->categoria->descricao}} </h3>
                <h1> {{$post->titulo}} </h1>
                <h4 class="mt-3"> {{$post->previa}} </h4>
                <hr class="mt-4">
                <p>Postado em {{$post->created_at}} </p>
                <div class="noticia-imagem my-3">
                    <img src="{{ url('storage/imagens/chamadas/'.$post->imagem) }}"/> 
                </div>

                <div class="conteudo">
                    <p class="text-justify">
                        {!! $post->conteudo !!}
                    </p>

                    <div class="mt-5 mb-4">
                        <h4>Fonte: Aviário Online</h4>
                        <hr>
                    </div>
                </div>

                <div class="comentarios">
                    <p class="deixe-comentario">
                        Deixe o seu comentário
                    </p>
                    
                    <hr class="mt-3">
                    <div class="px-0 fb-comments" data-href="https://10.0.0.120:8000/noticias/{{$post->id}}" data-numposts="5" data-width="100%">
                    </div>
                </div>
            </article>

            <article class="col-md-3 anuncios-laterais">
                <div class="col-12 anuncio px-0 mb-4">
                    <img src="{{ url('img/lateral-1.png/') }}" />
                </div>
                <div class="col-12 anuncio px-0 mb-4">
                    <img src="{{ url('img/lateral-2.jpg/') }}" />
                </div>
                <div class="col-12 anuncio px-0 mb-4">
                    <img src="{{ url('img/lateral-1.png/') }}" />
                </div>
            </article>
        </section>
        
    </section>
@endsection