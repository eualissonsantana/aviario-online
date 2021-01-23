@extends('layouts.app', ['bannersCarousel' => $bannersRetangulares])

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
                        <a href="{{route('posts.show', ['slug' => $enquete->slug, 'id' => $enquete->id])}}">
                            <section class="row li-noticia justify-content-between ">
                                <article class="col-12 col-md-8">
                                    <h3>{{$enquete->pergunta}}</h3>
                                    <div class="interacoes mt-2">
                                        @if($enquete->qtd_respostas($enquete->id) == 0)
                                            <p><span class="alerta">Essa enquete ainda não possui respostas</span> </p>
                                        @elseif($enquete->qtd_respostas($enquete->id) == 1)
                                            <p><span class="verde">  A enquete possui 1 resposta. </span></p>
                                        @else
                                            <p><span class="verde">  A enquete possui {{$enquete->qtd_respostas($enquete->id)}} respostas. </span></p>
                                        @endif
                                    </div>
                                    <div class="mt-2">
                                        <p>Criada em {{$enquete->created_at}}</p>
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
                                        <a href="{{url("painel/enquetes/$enquete->id")}}" class="js-del-enquete">
                                            <button class="btn btn-full btn-danger">Excluir</button>
                                        </a>
                                    </div>
                            </article>
                        </a>
                    </li>
                    <hr >
                @endforeach
            </ul>
        </div>

        <div class="col-3 d-none d-sm-block">
            <div class="mb-3 busca-nome d-none d-sm-block">
                <form class="form-inline" action="#" method="POST">
                    @csrf
                    <input type="text" hidden="true" name="option" value="titulo">
                    <input class="form-control " type="search" placeholder="Pesquisar por uma parte do nome" name="filter" aria-label="Search">
                    <button hidden="true" class="btn btn-salvar my-2 my-sm-0" type="submit">Buscar</button>
                </form>
            </div>

           
        </div>

    </article>
    
            
      
        @csrf

        
    </section>
@endsection