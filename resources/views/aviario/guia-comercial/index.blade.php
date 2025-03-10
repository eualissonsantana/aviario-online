@extends('layouts.app')
@section('title')
    Guia Comercial - Aviário Online
@stop
@section('content')    
    <section class="padding-padrao pt guia-comercial">
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

        <div class="">
            <h2>Guia Comercial do Aviário</h2>
        </div>
        
        <hr class="d-none d-sm-block">
        
        <article class="row justify-content-between align-items-end">
            <div class="col-12 col-md-6">
                <div class="legenda-guia d-none d-sm-block">
                    <p>Encontre os serviços e empresas do Aviário aqui.</p>
                </div>
                <form  action="{{route('aviario.empresas.search')}}" method="POST">
                    @csrf
                    <div class="area-procura-comercio">
                        <input type="text" hidden="true" name="option" value="nome">
                        <input type="text" class="procura-comercio" name="filter" placeholder="Pesquisar pelo nome da empresa">
                        <button><i type="submit" class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
            <div class="col-3 d-none d-sm-block info pb-1">
                <p><span class="destaque">{{$numEmpresas}}</span> empresas cadastradas.</p>
                <p>Não encontrou a sua? <a class="destaque" href="{{route('cadastrar-comercio')}}">Cadastre aqui!</a></p>
            </div>
            <div class="col-12 col-md-3 mt-3 mt-md-0 anuncie-sua-empresa">
                <a href="{{route('aviario.contato')}}">
                    <img src="{{ url('img/anuncie-sua-empresa.jpg') }}" alt="Anúncie sua empresa no Aviário Online" >
                </a>
            </div>
        </article>

        <section class="d-none d-sm-block mt-4">
            <div class="mb-3">
                <h2>Categorias</h2>
            </div>
            <article class="mt-4 row categorias">
                @foreach ($ramos as $ramo)
                <div class="col-3">
                    <div class="ramo mb-1">
                        <h4 class="mb-2"> {{$ramo->descricao}} </h4>
                        <ul>
                            @foreach ($categorias as $cat)
                                @if($cat->ramo_id == $ramo->id)
                                    <li> 
                                        <a href="{{route('guia.categoria', $cat->slug)}}"> {{$cat->descricao}}  </a> 
                                    </li>
                                    <hr class="my-1 p-0 mx-0 col-10 align-item-start">
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
                @endforeach
            </article>
        </section>
        
        <section class="d-block d-sm-none mt-3">
            <div class="accordion ramos-categorias " id="accordionExample">
                <div class="card">
                    <div class="card-header titulo-categoria text-left">
                        <h3>Categorias</h3>
                    </div>
                </div>
                @foreach ($ramos as $ramo)
                    <div class="card">
                        <div class="card-header" id="heading{{$ramo->id}}">
                            <a class="collapsed" href="#" data-toggle="collapse" data-target="#collapse{{$ramo->id}}" aria-expanded="true" aria-controls="{{$ramo->descricao}}">
                                <p class="mb-0 text-left">
                                    <strong>
                                        {{$ramo->descricao}}
                                    </strong>
                                </p>
                            </a>
                        </div>

                        @foreach ($categorias as $cat)
                            @if($cat->ramo_id == $ramo->id)
                                <div id="collapse{{$ramo->id}}" class="collapse" aria-labelledby="heading{{$ramo->id}}" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <a class="form-inline" href="{{route('guia.categoria', $cat->slug)}}" >
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
                                        </a>
                                    </div>
                                </div>
                            @endif   
                        @endforeach
                    </div>    
                @endforeach
            </div>
        </section>  


            
        
            
    </section>
@endsection