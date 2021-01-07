@extends('layouts.app')

@section('content')
    <section class="no-padding aviario-home aviario-rc">
        <section class="padding-padrao">
            <a href=" {{route('posts.show', ['slug' => $ultimoPost->slug, 'id' => $ultimoPost->id])}} ">
                <article class="ultimo-post ">
                    <h6>{{$ultimoPost->categoria->descricao}}</h6>
                    <h2> {{$ultimoPost->titulo}} </h2>
                    <p class="mt-3"> {{$ultimoPost->previa}} </p>
                </article>
            </a>
            <hr>
            <section class="row">  
                <article class="col-12 col-md-6 zoom ">
                    <a href="{{route('posts.show', ['slug' => $penultimoPost->slug, 'id' => $penultimoPost->id])}}">
                        <div class="penultimo-post px-0">
                            <img src="{{ url('storage/imagens/chamadas/'.$penultimoPost->imagem) }}" />
                            <div class="titulo-post">
                                <h6> {{$penultimoPost->categoria->descricao}} </h6>
                                <h3> {{$penultimoPost->titulo}} </h3>
                            </div>
                        </div>
                    </a>
                </article>
    
                <article class="row col-12 col-md-6 justify-content-between row-post-lateral">
                    @foreach ($posts as $post)
                        <div class="col-6 col-md-12 px-0 ">
                            <a href="{{route('posts.show', ['slug' => $post->slug, 'id' => $post->id])}}">
                                <article class="p-md-0 row posts-laterais ">
                                    <div class="col-12 col-md-6 mb-sm-2">
                                        <img src="{{ url('storage/imagens/chamadas/'.$post->imagem) }}" />
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
        </section>


        <section class="busca-guia-comercial container-fluid">
            <section class="container text-center">
                <article class="texto">
                    <h2>Guia Comercial do Aviário</h2>
                    <p>Encontre os comércios e serviços da comunidade.</p>
                </article>

                <article class="px-0">
                    <form>
                        <div class="form-group d-flex justify-content-center">
                          <input type="search" class="form-control procura-comercio" aria-describedby="emailHelp" placeholder="Pesquisar por nome ou categoria">
                        </div>
                        <button type="submit" hidden="true" class="btn btn-primary">Submit</button>
                    </form>
                </article>

                <article class="rodape mt-4">
                    <p>Não encontrou sua empresa?</p>
                    <button class="btn btn-lg btn-cadastrar">Cadastre-a</button>
                </article>
            </section>
        </section>

        <section class="padding-padrao">
            <article class="row justify-content-between px-0">
                <section class="col-12 col-md-8 row justify-content-between row-post-secundario">
                    @foreach ($postsSecundarios as $post)
                        <article class="col-6 col-post-secundario mb-3">
                            <a href="{{route('posts.show', ['slug' => $post->slug, 'id' => $post->id])}}">
                                <article class="posts-secundarios">
                                    <div class="">
                                        <img src="{{ url('storage/imagens/chamadas/'.$post->imagem) }}" />
                                    </div>
                                    <div class="">
                                        <h6 class="mt-1"> {{$post->categoria->descricao}} </h6>
                                        <h3> {{$post->titulo}} </h3>
                                    </div>
                                </article>
                            </a>
                        </article>
                    @endforeach
                </section>
                <section>

                </section>
            </article>

        </section>
        
        
    </section>

@endsection

