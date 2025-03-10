@extends('layouts.app')
@section('title')
    Aviário Online
@stop
@section('content')
    <section class="no-padding aviario-home aviario-rc">
        <div class="d-block d-sm-none banners-topo mb-3" onload="defineActiveMobile()">
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
        <section class="padding-padrao">

            <section class="row">  
                @if($ultimoPost)
                    <article class="col-12 col-md-6 zoom ">
                        <a href="{{route('posts.show', ['slug' => $ultimoPost->slug, 'id' => $ultimoPost->id])}}">
                            <div class="penultimo-post px-0">
                                <img src="{{ url('public/storage/imagens/chamadas/'.$ultimoPost->imagem) }}" />
                                <div class="titulo-post">
                                    <h6> {{$ultimoPost->categoria->descricao}} </h6>
                                    <h3> {{$ultimoPost->titulo}} </h3>
                                </div>
                            </div>
                        </a>
                    </article>
                @endif
    
                <article class="row col-12 col-md-6 justify-content-between row-post-lateral">
                    @if(isset($posts))
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
                    @endif
                </article>
    
               
            </section>

            @if($quartoPost)
                <hr>
                <a href=" {{route('posts.show', ['slug' => $quartoPost->slug, 'id' => $quartoPost->id])}} ">
                    <article class="ultimo-post ">
                        <h6>{{$quartoPost->categoria->descricao}}</h6>
                        <h2> {{$quartoPost->titulo}} </h2>
                        <p class="mt-3"> {{$quartoPost->previa}} </p>
                    </article>
                </a>
                
            @endif
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
                        <button  class="btn btn-lg btn-cadastrar">Cadastre aqui</button>
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
                        <p class="mt-2 legenda">Essas e muitas outras categorias no <br class="d-block d-sm-none"> <a href="{{route('guia.index')}}"><span class="destaque"> Guia Comercial do Aviário </span></a></p>
                    </div>
                    <hr>
                    @if($enquete != null)
                        @if($enquete->aberta)
                        
                            <div class="enquete">
                                <div class="card">
                                    <div class="card-header">
                                        @if(!isset($_COOKIE['enquete-'.$enquete->id]))
                                            <p>Queremos saber a sua opinião!</p>
                                        @else
                                            <p>Resultado parcial</p>
                                        @endif 
                                    </div>
                                    <div class="card-body">
                                        <div class="alert alert-success alert-dismissible fade mensagemBox d-none show mt-2" id="resposta-registrada" role="alert" onload="foco()">
                                            
                                        </div>
                                        <h3> {{$enquete->pergunta}} </h3>
                                        @if(!isset($_COOKIE['enquete-'.$enquete->id]))
                                            <div class="pergunta mt-2 divFormVoto">
                                                <form class="mt-3" name="formVoto">
                                                    @csrf
                                                    <div class="text-left opcao">
                                                        @foreach ($opcoes as $opcao)
                                                            <div class="form-check form-check-inline">
                                                                <input type="text" hidden="true" name="enquete" id="enquete_id" value=" {{$enquete->id}} ">
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
                                            <div class="resultadoParcial d-none">
                                                @php
                                                    $i = 1;
                                                @endphp

                                                @foreach ($opcoes as $opcao)
                                                    @if($opcao->enquete_id == $enquete->id)
                                                       <p class="mt-2 parcial-{{$i}}"></p>
                                                    @endif
                                                    @php
                                                        $i++;
                                                    @endphp
                                                @endforeach

                                                
                                            </div>
                                        @else 
                                            <div class="resultadoParcial">
                                                @php
                                                    $totalVotos = 0;
                                                    $opcoesEnquete; 
                                                @endphp

                                                @foreach ($opcoes as $opcao)
                                                    @if($opcao->enquete_id == $enquete->id)
                                                        @php
                                                            $totalVotos = $totalVotos + $opcao->qtd_votos;
                                                        @endphp
                                                    @endif
                                                @endforeach

                                                @foreach ($opcoes as $opcao)
                                                    @if($opcao->enquete_id == $enquete->id)
                                                        <p class="mt-2"> {{$opcao->descricao}} - {{round(($opcao->qtd_votos / $totalVotos) * 100, 2)}}% </p>
                                                    @endif
                                                @endforeach
                                                <p class="destaque"><small> Você respondeu essa enquete</small></p>
                                            </div>

                                        @endif
                                        
                                        
                                    </div>
                                </div>
                            </div>
                        @endif
                    @endif
                </section>

               
                <div class="col-12 mt-3 anuncio d-block d-sm-none">
                    <div id="carouselExampleControls" class="carousel slide carousel-quadrado-mobile" data-ride="carousel" >
                        <div class="carousel-inner">
                            @if(isset($bannersQuadrados))
                                @foreach ($bannersQuadrados as $banner)
                                    <div class="carousel-item carousel-quadrado-mobile-item">
                                        <img class="d-block w-100" src="{{ url('public/storage/imagens/banners/'.$banner->imagem) }}" alt="{{$banner->titulo}}">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <section class="col-md-3 anuncios-laterais d-none d-sm-block">
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
                </section>
            </article>
        </section>
    </section>
@endsection


