@extends('layouts.app', ['bannersCarousel' => $bannersRetangulares])

@section('content')
    <section class="padding-padrao pt painel-banners">
        <article class="row justify-content-between">
            <div class="col-12 col-md-6 mt-md-2">
                <h2>Banners</h2>
            </div>
            
            <div class="col-12 col-md-2 text-right">
                <a href="{{route("banners.create")}}">
                    <button class="btn btn-sm btn-novo">Novo</button>
                </a>
            </div>
        </article>
        
        <hr>
        
        @csrf
        <ul>
            @foreach ($banners as $banner)
                @if($banner)
                    <li>
                        <section class="row px-md-3 justify-content-between">
                            <article class="px-3 px-md-0 col-12 col-md-8">
                                <h4 > {{$banner->titulo}} </h4>
                                
                            </article>
                            <article class="row botoes col-12 col-md-4 justify-content-end pr-3 pr-md-4">
                                <div class="col-6 pl-0">
                                    <a href="{{url("painel/banners/$banner->id/edit")}}">
                                        <button class="btn btn-sm btn-primary">Editar</button>
                                    </a>
                                </div>
                                <div class="col-6 pr-0">
                                    <a href="{{url("painel/banners/$banner->id")}}" class="ml-2 js-del-banner">
                                        <button class="btn btn-sm btn-danger">Excluir</button>
                                    </a>
                                </div>
                            </article>
                        </section>

                        <section class="mt-2">
                            @if($banner->ativo)
                                <h6> <span class="mb-2 verde"> Banner ativo</span></h6>
                            @else 
                                <h6> <span class="mb-2 alerta"> Banner inativo</span></h6>
                            @endif
                            @if ($banner->posicao == 'topo')
                                <img class="banner-topo" src="{{ url('storage/imagens/banners/'.$banner->imagem) }}" />
                            @else    
                                <img class="banner-lateral" src="{{ url('storage/imagens/banners/'.$banner->imagem) }}" />
                            @endif
                        </section>
                    </li>
                    <hr>
                @endif
            @endforeach
        </ul>
    </section>
@endsection