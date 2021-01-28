@extends('layouts.app')

@section('content')
<section class="aviario-noticias padding-padrao pt">
    <div class="d-block d-sm-none banners-topo mb-3">
        <div id="carouselExampleControls" class="carousel slide carousel-mobile" data-ride="carousel" >
            <div class="carousel-inner">
                @if(isset($bannersRetangulares))
                    @foreach ($bannersRetangulares as $banner)
                        <div class="carousel-item carousel-mobile-item">
                            <img class="d-block w-100" src="{{ url('storage/imagens/banners/'.$banner->imagem) }}" alt="{{$banner->titulo}}">
                        </div>
                    @endforeach
                @endif
            </div>
        </div>
    </div>

    <article>
        <div>
            <h2>Enquetes</h2>
        </div>
    </article>
    
    <hr>

    <article>
        <div>
            <ul>
                @foreach ($enquetes as $enquete)
                    <li>
                        <section class="row li-noticia justify-content-between ">
                            <article class="col-12 col-md-8">
                                <h3>{{$enquete->pergunta}}</h3>
                                <div class="interacoes mt-2">
                                    @if(isset($_COOKIE['enquete-'.$enquete->id]))
                                        <p>Você já respondeu essa enquete</p>    
                                    @else
                                        
                                    @endif
                                </div>
                                <div class="mt-2">
                                    <p>Criada em {{date('j \d\e M \à\s  H:i\h', strtotime($enquete->created_at))}}</p>
                                </div>
                            </article>
                        </section>
                    </li>
                    <hr>
                @endforeach
            </ul>
        </div>
    </article>
</section>
@endsection