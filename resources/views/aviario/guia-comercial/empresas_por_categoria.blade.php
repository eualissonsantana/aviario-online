@extends('layouts.app')

@section('content')    
    <section class="padding-padrao pt empresas-por-categoria ">
        <div class="d-block d-sm-none banners-topo mb-3">
            <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" >
                <div class="carousel-inner">
                    @if(isset($bannersRetangulares))
                        @foreach ($bannersRetangulares as $banner)
                            <div class="carousel-item carousel-mobile">
                                <img class="d-block w-100" src="{{ url('public/storage/imagens/banners/'.$banner->imagem) }}" alt="{{$banner->titulo}}">
                            </div>
                        @endforeach
                    @endif
                </div>
            </div>
        </div>
        
        <article class="row justify-content-between px-md-3">
            <div class="col-sm-12 px-md-0 titulo-pagina">
                <h2> Guia Comercial / {{$categoria->descricao}} </h2>
                <hr class="">
            </div>
        
        </article>
        @csrf

        <section class="row pl-md-3 justify-content-between">
            <article class="col-12 col-md-9 px-md-0">
                <ul class="">
                    @foreach ($empresas as $emp)
                        <li>
                            <a href="#">
                                <section class="row col-sm-12 mx-0 px-0">
                                    <article class="imagem-comercio col-4 col-md-2 col-xl-3 px-0 mr-0">
                                        <img src="{{ url('public/storage/imagens/empresas/logomarcas/'.$emp->imagem)}}"/>
                                    </article>

                                    <article class="info-comercio col-8 col-md-10 col-xl-9 pl-2 pl-md-0 px-0 py-md-4 d-flex align-content-around flex-wrap">
                                        <div class="nome col-12 px-0">
                                            <h4> {{$emp->nome}} </h4>
                                            <p class="d-none d-sm-block"> {{$emp->slogan}} </p>
                                        </div>
                                        <div class="endereco col-12 px-0">
                                            <p>
                                                @if($emp->endereco->logradouro)
                                                    {{$emp->endereco->logradouro}} ,
                                                @endif
                                                @if ($emp->endereco->numero)
                                                    {{$emp->endereco->numero}}
                                                @endif
                                            </p>

                                            <p>
                                                {{$emp->endereco->bairro}} -

                                                @if ($emp->endereco->cep)
                                                    {{$emp->endereco->rua}} -
                                                @endif

                                                Feira de Santana/BA
                                            </p>
                                        </div>

                                        <div class="contatos col-12 px-0">
                                            <h4> {{$emp->telefone}} </h4>
                                        </div>
                                    </article>
                                    
                                    <hr class="col-11 px-md-0 mx-md-0">
                                </section>
                            </a> 
                        </li>
                    @endforeach
                </ul>
            </article>   

            <article class="col-md-3 anuncios-laterais">
                <div class="col-12 anuncio px-0 mb-5">
                    <div id="carouselExampleControls" class="carousel slide" data-ride="carousel" data-interval="5400">
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
            </article>
        </section>
    </section>
@endsection