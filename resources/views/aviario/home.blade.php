@extends('layouts.app')

@section('content')
    <section class="no-padding aviario-home aviario-rc">
        <div class="d-block d-sm-none banners-topo mb-3" onload="defineActiveMobile()">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" >
                <div class="carousel-inner">
                    @if(isset($bannersRetangulares))
                        @foreach ($bannersRetangulares as $banner)
                            <div class="carousel-item carousel-mobile">
                                <img class="d-block w-100" src="{{ url('storage/imagens/banners/'.$banner->imagem) }}" alt="{{$banner->titulo}}">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        <section class="padding-padrao">
            @if($ultimoPost)
                <a href=" {{route('posts.show', ['slug' => $ultimoPost->slug, 'id' => $ultimoPost->id])}} ">
                    <article class="ultimo-post ">
                        <h6>{{$ultimoPost->categoria->descricao}}</h6>
                        <h2> {{$ultimoPost->titulo}} </h2>
                        <p class="mt-3"> {{$ultimoPost->previa}} </p>
                    </article>
                </a>
                <hr>
            @endif
            <section class="row">  
                @if($penultimoPost)
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
                @endif
    
                <article class="row col-12 col-md-6 justify-content-between row-post-lateral">
                    @foreach ($posts as $post)
                        <div class="col-6 col-md-12 px-0 ">
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
        </section>


        <section class="busca-guia-comercial container-fluid">
            <section class="container text-center">
                <article class="texto">
                    <h2>Guia Comercial do Aviário</h2>
                    <p>Encontre os comércios e serviços da comunidade.</p>
                </article>

                <article class="d-flex justify-content-center px-0">
                    <form  action="{{route('aviario.empresas.search')}}" method="POST">
                        @csrf
                        <div class="area-procura-comercio">
                            <input type="text" hidden="true" name="option" value="nome">
                            <input type="text" class="procura-comercio" name="filter" placeholder="Pesquisar por nome ou categoria">
                            <button><i type="submit" class="fas fa-search"></i></button>
                        </div>
                    </form>
                </article>

                <article class="rodape mt-4">
                    <p>Não encontrou sua empresa?</p>
                    <a href="http://aviario.online/cadastrar">
                        <button  class="btn btn-lg btn-cadastrar">  Cadastre aqui</button>
                    </a>
                </article>
            </section>
        </section>

        <section class="padding-padrao">
            <article class="row justify-content-between px-0">
                <section class="col-12 col-md-8 ">
                    <div class="row area-categoria">
                        <div class="col-12 mb-4">
                            <h2>Os serviços que você procura estão aqui:</h2>
                        </div>
                        @if($empresaCategorias)
                            <div class="row col-12 linha-categorias">
                                @foreach ($empresaCategorias as $cat)
                                    <div class="categorias-random mb-3 shadow-sm">
                                        <a href="{{route('guia.categoria', $cat->slug)}}">
                                            <p>{{$cat->descricao}}</p>
                                        </a>
                                    </div>

                                    
                                @endforeach
                                
                            </div> 
                        @endif
                    </div>
                    <div class="legenda-area-categoria">
                        <p class="mt-2 legenda">Essas e muitas outras categorias no <br class="d-block d-sm-none"><span class="destaque"> Guia Comercial do Aviário </span></p>
                    </div>
                    <hr>

                    @if(!jaVotou(request()->cookie('XSRF-TOKEN')))
                        <div class="enquete">
                            <div class="card">
                                <div class="card-header">
                                    <p>Queremos saber a sua opinião!</p>
                                </div>
                                <div class="card-body">
                                    <div class="pergunta mt-2">
                                        <h3> {{$enquete->pergunta}} </h3>
                                        <form class="mt-3" action="{{route('aviario.enquetes.respostas')}}" method="POST">
                                            @csrf
                                            <div class="text-left opcao">
                                                @foreach ($opcoes as $opcao)
                                                    <div class="form-check form-check-inline">
                                                        <input type="text" hidden="true" name="enquete" value=" {{$enquete->id}} ">
                                                        <input class="form-check-input" type="radio" name="resposta" id="inlineRadio1" value=" {{$opcao->id}} ">
                                                        <label class="form-check-label" for="inlineRadio1"> {{$opcao->descricao}} </label>
                                                    </div>
                                                @endforeach
                                                
                                                <div class="mt-3">
                                                    <button type="submit" class="btn btn-primary">Enviar Resposta</button>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    @else
                        <div id="carouselExampleControls" class="carousel slide active" data-ride="carousel" >
                            <div class="carousel-inner">
                                @if(isset($bannersRetangulares))
                                    @foreach ($bannersRetangulares as $banner)
                                        <div class="carousel-item bottom-carousel">
                                            <img class="d-block w-100" src="{{ url('public/storage/imagens/banners/'.$banner->imagem) }}" alt="{{$banner->titulo}}">
                                        </div>
                                    @endforeach
                                @endif
                            </div>
                        </div>
                    @endif
                </section>

               
                <div class="col-12 mt-3 anuncio d-block d-sm-none">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" >
                        <div class="carousel-inner">
                            @if(isset($bannersQuadrados))
                                @foreach ($bannersQuadrados as $banner)
                                    <div class="carousel-item bottom-carousel-mobile">
                                        <img class="d-block w-100" src="{{ url('public/storage/imagens/banners/'.$banner->imagem) }}" alt="{{$banner->titulo}}">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <section class="col-md-3 anuncios-laterais d-none d-sm-block">
                    @foreach ($bannersQuadrados as $banner)
                        <div class="col-12 anuncio px-0 mb-5">
                            <img src="{{ url('public/storage/imagens/banners/'.$banner->imagem) }}" />
                        </div>    
                    @endforeach
                   
                </section>
            </article>
        </section>
    </section>

@endsection

