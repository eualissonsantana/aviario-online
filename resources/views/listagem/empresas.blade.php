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
                <ul>
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
                                        <a href="{{url("painel/empresas/$emp->id")}}" class="js-del-emp">
                                            <button class="btn btn-full btn-danger">Excluir</i></button>
                                        </a>
                                    </div>
                                </article>
                            </section>
                        </li>

                        <hr>
                    @endforeach
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
                                        </strong>
                                    </p>
                                </a>
                            </div>
                            @foreach ($ramo->categoria as $cat)
                                <div id="collapse{{$ramo->id}}" class="collapse" aria-labelledby="heading{{$ramo->id}}" data-parent="#accordionExample">
                                    <div class="card-body">
                                        <form class="form-inline" action="{{route('empresas.search')}}" method="POST">
                                            @csrf
                                            <div class="input-group-prepend categoria">
                                                <button class="btn btn-categoria" type="button submit">
                                                    <p class="mb-0 text-left ">
                                                        <strong>
                                                            {{$cat->descricao}}
                                                        </strong>
                                                    </p>
                                                </button>
                                            </div>
                                            <input class="form-control" type="search" hidden="true" name="filter" value="{{$cat->id}}" aria-label="Search">
                                            <input type="text" hidden="true" name="option" value="categoria">
                                        </form>
                                    </div>
                                </div>    

                                
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