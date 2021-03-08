@extends('layouts.app')

@section('content')    
    <section class="padding-padrao pt empresas-por-categoria guia-comercial">
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
                <p>Não encontrou a sua? <span class="destaque"> <a href="{{route('cadastrar-comercio')}}">Cadastre aqui!</a></span></p>
            </div>
            <div class="col-12 col-md-3 mt-3 mt-md-0 anuncie-sua-empresa">
                <a href="{{route('aviario.contato')}}">
                    <img src="{{ url('img/anuncie-sua-empresa.jpg') }}" alt="Anúncie sua empresa no Aviário Online" >
                </a>
            </div>
        </article>
        @csrf

        <section class="row pl-md-3 mt-3 justify-content-between">
            <article class="col-12 col-md-9 px-md-0">
                <ul class="">
                    @if($empresas[0] != null)
                        @foreach ($empresas as $emp)
                            <li>
                                <a href="{{route('empresas.show', ['slug' => $emp->slug, 'id' => $emp->id])}}">
                                    <section class="row col-sm-12 mx-0 px-0">
                                        <article class="imagem-comercio col-5 col-md-2 col-xl-3 px-0 mr-0">
                                            @if($emp->imagem != null)
                                                <img src="{{ url('public/storage/imagens/empresas/logomarcas/'.$emp->imagem)}}"/>
                                            @else
                                                <img src="{{ url('img/sem-imagem.png') }}" />
                                            @endif
                                        </article>

                                        <article class="dados-comercio col-7 col-md-10 col-xl-9 pl-2 pl-md-0 px-0 py-md-4 d-flex align-content-around flex-wrap">
                                            <div class="nome col-12 px-0">
                                                <h6>{{$emp->categoria->descricao}}</h6>
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
                    @else 
                        <h3>Nenhuma empresa encontrada</h3>
                    @endif
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