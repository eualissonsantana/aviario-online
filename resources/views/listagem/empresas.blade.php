@extends('layouts.app')

@section('content')
    <section class="content-child painel-empresas">
        <article class="row justify-content-between ">
            <div class="col-6">
                <h2>Comércios</h2>
            </div>
            <div class="col-6 text-right">
                <a href="{{route("empresas.create")}}">
                    <button class="btn btn-lg btn-novo">Novo</button>
                </a>
            </div>
            
        </article>

        <hr>

        <article class="row justify-content-between">
            <div class="col-8 lista-empresas">
                <ul>
                    @foreach ($empresas as $emp)
                        <li>
                            <section class="row justify-content-between">
                                <article class="col-5 col-md-4 col-lg-2 col-xl-2 imagem-comercio ">
                                    <img src="{{ url('storage/imagens/empresas/logomarcas/'.$emp->imagem) }}" />
                                </article>
        
                                <article class="col-6 col-md-5 dados-comercio ">
                                    <article class="mb-3">
                                        <h6>{{$emp->categoria->descricao}}</h6>
                                        <h3><strong>{{$emp->nome}}</strong></h3>
                                        <h5 class="mt-1 d-none d-sm-block">{{$emp->slogan}} </h5>
                                    </article>
                                    <article class="mb-3">
                                        <p>
                                            {{$emp->endereco->logradouro}}, {{$emp->endereco->numero}} <br> 
                                            {{$emp->endereco->bairro}} - Feira de Santana/BA
                                        </p>
                                    </article>
                                    <article class="telefone">
                                        <h5>{{$emp->telefone}}</h5>
                                    </article>
                                    
                                </article>
        
                                <article class="row botoes col-md-3 col-12 justify-content-end pr-4">
                                    <a href="{{url("painel/empresas/$emp->id/edit")}}">
                                        <button class="btn btn-editar">Editar</button>
                                    </a>
                                    <a href="{{url("painel/empresas/$emp->id")}}" class="ml-2 js-del-emp">
                                        <button class="btn btn-excluir">Excluir</button>
                                    </a>
                                </article>
                            </section>
                        </li>

                        <hr>
                    @endforeach
                </ul>
            </div>
            <div class="col-3">
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
                            <h3 >Categorias</h3>
                        </div>
                    </div>
                    @foreach ($ramos as $ramo)
                        <div class="card">
                            <div class="card-header" id="heading{{$ramo->id}}">
                                <a class="collapsed"  href="#" data-toggle="collapse" data-target="#collapse{{$ramo->id}}" aria-expanded="true" aria-controls="{{$ramo->descricao}}">
                                    <h4 class="mb-0 text-left">
                                            {{$ramo->descricao}}
                                    </h4>
                                </a>
                            </div>
                            @foreach ($ramo->categoria as $cat)
                                <div id="collapse{{$ramo->id}}" class="collapse" aria-labelledby="heading{{$ramo->id}}" data-parent="#accordionExample">
                                    <div class="card-body">
                                        {{$cat->descricao}}
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