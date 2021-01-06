@extends('layouts.app')

@section('content')
    <section class="content-child aviario-home aviario-rc">
        <a href=" {{route('posts.show', ['slug' => $ultimoPost->slug, 'id' => $ultimoPost->id])}} ">
            <article class="ultimo-post ">
                <h6>{{$ultimoPost->categoria->descricao}}</h6>
                <h2> {{$ultimoPost->titulo}} </h2>
                <p class="mt-3"> {{$ultimoPost->previa}} </p>
            </article>
        </a>
        <hr>
        <section class="row ">  
            <article class="col-12 col-md-6 zoom ">
                <a href="{{route('posts.show', ['slug' => $penultimoPost->slug, 'id' => $penultimoPost->id])}}">
                    <div class="penultimo-post px-0">
                        <img src="{{ url('public/storage/imagens/chamadas/'.$penultimoPost->imagem) }}" />
                        <div class="titulo-post">
                            <h6> {{$penultimoPost->categoria->descricao}} </h6>
                            <h3> {{$penultimoPost->titulo}} </h3>
                        </div>
                    </div>
                </a>
            </article>

            <article class="row col-12 col-md-6 justify-content-between row-post-lateral">
                @foreach ($posts as $post)
                    <div class="col-6 col-md-12 px-0  ">
                        <a href="{{route('posts.show', ['slug' => $post->slug, 'id' => $post->id])}}">
                            <article class="p-md-0 row posts-laterais ">
                                <div class="col-12 col-md-6 mb-sm-2">
                                    <img src="{{ url('public/storage/imagens/chamadas/'.$post->imagem) }}" />
                                </div>
                                <div class="col-12 col-md-6 pl-lg-0 teste">
                                    <h6 class="mt-2 mt-md-0"> {{$post->categoria->descricao}} </h6>
                                    <h3> {{$post->titulo}} </h3>
                                    <div class="mt-1 previa d-none d-sm-block">
                                        <p> {{$post->previa}}  </p>
                                    </div>
                                </div>
                            </article>
                        </a>
                    </div> 
                @endforeach
            </article>

           
        </section>
        <hr>
        
        
    </section>

@endsection

