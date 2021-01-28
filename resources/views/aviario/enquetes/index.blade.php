@extends('layouts.app')

@section('content')
<section class="aviario-enquetes padding-padrao pt">
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
                    <li class="mb-3">
                        <article class="card">
                            <div class="card-header">
                                <h3>{{$enquete->pergunta}}</h3>
                            </div>

                            <div class="card-body">
                                <div class="interacoes mt-2">
                                    @if(isset($_COOKIE['enquete-'.$enquete->id]))
                                        <p class="destaque"><small> Você respondeu essa enquete</small></p>    
                                    @else
                                        <form class="mt-3" action="{{route('aviario.enquetes.respostas')}}" method="POST">
                                            @csrf
                                            <div class="opcao">
                                                @foreach ($opcoes as $opcao)
                                                    @if($opcao->enquete_id == $enquete->id)
                                                        <div class="form-check form-check-inline">
                                                            <input type="text" hidden="true" name="enquete" value=" {{$enquete->id}} ">
                                                            <input class="form-check-input" type="radio" name="resposta" id="inlineRadio1" value=" {{$opcao->id}} ">
                                                            <label class="form-check-label" for="inlineRadio1"> {{$opcao->descricao}} </label>
                                                        </div>
                                                    @endif
                                                @endforeach
                                                
                                                <div class="mt-3">
                                                    <button type="submit" class="btn btn-primary">Enviar Resposta</button>
                                                </div>
                                            </div>
                                        </form>
                                    @endif

                                    @php
                                        $totalVotos = 0;
                                        $opcoesEnquete; 
                                    @endphp

                                    @if(!$enquete->aberta)

                                        
                                        @foreach ($opcoes as $opcao)
                                            @if($opcao->enquete_id == $enquete->id)
                                                @php
                                                    $totalVotos = $totalVotos + $opcao->qtd_votos;
                                                @endphp
                                            @endif
                                        @endforeach

                                        @foreach ($opcoes as $opcao)
                                            @if($opcao->enquete_id == $enquete->id)
                                                <p class="mt-2"> {{$opcao->descricao}} - {{($opcao->qtd_votos / $totalVotos) * 100}}% </p>
                                            @endif
                                        @endforeach

                                        
                                        
                                    @endif
                                </div>
                                
                                <div class="mt-3 row col-12">
                                    <p><small>Criada em {{date('j \d\e M \à\s  H:i\h', strtotime($enquete->created_at))}} - </small></p>
                                    
                                    @if(!$enquete->aberta)
                                        <p class="alerta ml-2"><small> enquete encerrada</small></p>
                                    @else
                                        <p class="ml-2"><small> Em breve traremos os resultados dessa enquete.</small></p>
                                    @endif
                                </div>    
                            </div>
                            
                        </article>
                    </li>
                   
                @endforeach
            </ul>
        </div>
    </article>
</section>
@endsection