@extends('layouts.app')

@section('content')
    <section class="exibe-noticia">
        <p></p>
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
                    <p class="deixe-comentario">
                        Deixe o seu comentário
                    </p>
                    
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