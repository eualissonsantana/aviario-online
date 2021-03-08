@extends('layouts.app', ['bannersCarousel' => $bannersRetangulares])
@section('title')
    Enquetes - Aviário Online
@stop
@section('content')    
<div class="padding-padrao pt painel-enquetes">
    <div class="row justify-content-between titulo">
        <div class="col-8 col-md-6 mt-md-2">
            <h2>Enquetes</h2>
        </div>
        <div class="col-12 col-md-6 text-right">
            <a href="{{route("enquetes.create")}}">
                <button class="btn btn-lg btn-novo">Nova</button>
            </a>
        </div>
    </div>
    
    <hr class="">

    <article class="row justify-content-between">
        <div class="col-12 col-md-8 lista-noticias">
            <ul>
                @foreach ($enquetes as $enquete)
                    <li> 
                        <section class="row li-noticia justify-content-between ">
                            <article class="col-12 col-md-8">
                                <h3>{{$enquete->pergunta}}</h3>
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
                                            @if($totalVotos > 0)
                                                <p class="mt-2"> {{$opcao->descricao}} - {{round(($opcao->qtd_votos / $totalVotos) * 100, 2)}}% </p>
                                            @endif
                                        @endif
                                    @endforeach

                                        
                                        
                                <div class="interacoes mt-2">
                                    @if($enquete->qtd_respostas($enquete->id) == 0)
                                        <p><span class="alerta">Essa enquete ainda não possui respostas</span> </p>
                                    @elseif($enquete->qtd_respostas($enquete->id) == 1)
                                        <p><span class="verde">  A enquete possui 1 resposta. </span></p>
                                    @else
                                        <p><span class="verde">  A enquete possui {{$enquete->qtd_respostas($enquete->id)}} respostas. </span></p>
                                    @endif
                                </div>
                                <div class="mt-2 row col-12">
                                    <p>Criada em {{date('j \d\e M \à\s  H:i\h', strtotime($enquete->created_at))}}</p>

                                    @if(!$enquete->aberta)
                                        <p class="alerta ml-2">Enquete encerrada</p>
                                    @else
                                         <p class="destaque ml-2">- Enquete aberta</p>
                                    
                                @endif
                                </div>
                            </article>

                        </section>
                        <article class="row col-12 col-md-4 px-0 px-md-3 mt-3 botoes justify-content-end">
                                <div class="col-6 pl-0">
                                    <a href="{{url("painel/enquetes/$enquete->id/edit")}}">
                                        <button class="btn btn-full btn-primary">Editar</button>
                                    </a>
                                </div>
                                <div class="col-6 pr-0">
                                    <button class="btn btn-full btn-danger" data-toggle="modal" data-target="#modal{{$enquete->id}}">Excluir</i></button>
                            
                                    <!-- Modal -->
                                    <div class="modal fade" id="modal{{$enquete->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                            <h5 class="modal-title" id="exampleModalLabel">Deseja realmente excluir essa enquete?</h5>
                                            <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                            <form action="{{url("painel/enquetes/$enquete->id")}}" method="POST" data-toggle="modal" data-target="#modal{{$enquete->id}}">
                                                @csrf
                                                @method('DELETE')
                                                <button type="submit" class="btn btn-full btn-danger">Excluir</button>
                                            </form>
                                            </div>
                                        </div>
                                        </div>
                                    </div>
                                </div>

                                
                        </article>
                    </li>
                    <hr >
                @endforeach
            </ul>
        </div>

        

    </article>
    
            
      
        @csrf

        
    </section>
@endsection