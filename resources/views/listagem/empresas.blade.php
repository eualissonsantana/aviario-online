@extends('layouts.app', ['bannersCarousel' => $bannersRetangulares])

@section('content')
    <section class="padding-padrao pt painel-empresas">
        <article class="row justify-content-between ">
            <div class="col-12 col-md-6">
                <h2>Comércios</h2>
            </div>
            <div class="mt-2 mt-md-0 col-12 col-md-6 text-right">
                <a href="{{route("empresas.create")}}">
                    <button class="btn btn-lg btn-novo">Novo</i></button>
                </a>
            </div>
            
        </article>

        <hr>

        <article class="row justify-content-between">
            <div class="col-12 col-md-8 lista-empresas">
                @csrf
                <ul>
                    @if($empresas[0] != null)
                        @foreach ($empresas as $emp)
                            <li>
                                <section class="row justify-content-between">
                                    <article class="col-5 col-md-3 imagem-comercio ">
                                        <img src="{{ url('public/storage/imagens/empresas/logomarcas/'.$emp->imagem) }}" />
                                    </article>
            
                                    <article class="col-7 col-md-5 dados-comercio ">
                                        <article class="mb-1 mb-md-3">
                                            <h6>{{$emp->categoria->descricao}}</h6>
                                            <h3>{{$emp->nome}}</h3>
                                            <h5 class="mt-1 d-none d-sm-block">{{$emp->slogan}} </h5>
                                        </article>
                                        <article class="mb-2 mb-md-3 endereco">
                                            <p>
                                                {{$emp->endereco->logradouro}}, {{$emp->endereco->numero}} <br> 
                                                {{$emp->endereco->bairro}} - Feira de Santana/BA
                                            </p>
                                        </article>
                                        <article class="telefone">
                                            <h5>{{$emp->telefone}}</h5>
                                        </article>
                                        
                                    </article>
            
                                    <article class="row botoes col-12 col-md-4 justify-content-end pr-3 pr-md-5">
                                        <div class="col-6 pl-0">
                                            <a href="{{url("painel/empresas/$emp->id/edit")}}">
                                                <button class="btn btn-full btn-primary">Editar</i></button>
                                            </a>
                                        </div>
                                        <div class="col-6 pr-0">
                                            <button class="btn btn-full btn-danger" data-toggle="modal" data-target="#modal{{$emp->id}}">Excluir</i></button>
                                
                                            <!-- Modal -->
                                            <div class="modal fade" id="modal{{$emp->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">Deseja realmente excluir esse comércio?</h5>
                                                    <button type="button" class="close" data-dismiss="modal" aria-label="Fechar">
                                                        <span aria-hidden="true">&times;</span>
                                                    </button>
                                                    </div>
                                                    <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancelar</button>
                                                    <form action="{{url("painel/empresas/$emp->id")}}" method="POST" data-toggle="modal" data-target="#modal{{$emp->id}}">
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
                                </section>
                            </li>

                            <hr>
                        @endforeach
                    @else
                        <h3>Nenhuma empresa encontrada</h3>
                    @endif
                </ul>
            </div>
            <div class="col-3 d-none d-sm-block">
                <div class="mb-3 busca-nome d-none d-sm-block ">
                    <form class="form-inline my-2 my-lg-0 " action="{{route('empresas.search')}}" method="POST">
                        @csrf
                        <input type="text" hidden="true" name="option" value="nome">
                        <input class="form-control" type="search" placeholder="Procurar comércio" name="filter" aria-label="Search">
                        <button hidden="true" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>

                <div class="accordion ramos-categorias" id="accordionExample">
                    <div class="card">
                        <div class="card-header titulo-categoria text-left">
                            <h3>Categorias</h3>
                        </div>
                    </div>
                    @foreach ($ramos as $ramo)
                        <div class="card">
                            <div class="card-header" id="heading{{$ramo->id}}">
                                <a class="collapsed ramo" href="#" data-toggle="collapse" data-target="#collapse{{$ramo->id}}" aria-expanded="true" aria-controls="{{$ramo->descricao}}">
                                    <p class="mb-0 text-left">
                                        <strong>
                                            {{$ramo->descricao}}
                                    </p>
                                </a>
                            </div>

                           @foreach ($categorias as $cat)
                            @if($cat->ramo_id == $ramo->id)
                                <div id="collapse{{$ramo->id}}" class="collapse" aria-labelledby="heading{{$ramo->id}}" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <a class="form-inline" href="{{route('empresas.busca', $cat->slug)}}">
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
            </div>

        </article>
        
        @csrf
        <div class="container">
            {{ $empresas->links() }}
        </div>
    </section>
@endsection