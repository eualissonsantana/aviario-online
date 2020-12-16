@extends('layouts.app')

@section('content')    
    <section class="content-child empresas-por-categoria ">
        <article class="row justify-content-between px-md-3">
            <div class="col-sm-12 px-md-0 titulo-pagina">
                <h3> {{$categoria->descricao}} </h3>
                <hr class="">
            </div>
        
        </article>
        @csrf

        <section class="row pl-md-3 justify-content-between">
            <article class="col-12 col-md-9 px-md-0">
                <ul class="">
                    @foreach ($empresas as $emp)
                        <li>
                            <a href="#">
                                <section class="row col-sm-12 mx-0 px-0">
                                    <article class="imagem-comercio col-4 col-md-2 col-xl-3 px-0 mr-0">
                                        <img src="{{ url('storage/imagens/empresas/'.$emp->imagem)}}"/>
                                    </article>

                                    <article class="info-comercio col-8 col-md-10 col-xl-9 pl-2 pl-md-0 px-0 py-md-4 d-flex align-content-around flex-wrap">
                                        <div class="nome col-12 px-0">
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
                </ul>
            </article>   

            <article class="col-md-3 anuncios-laterais">
                <div class="col-12 anuncio px-0 mb-4">
                    <img src="{{ url('img/lateral-1.png/') }}" />
                </div>
                <div class="col-12 anuncio px-0 mb-4">
                    <img src="{{ url('img/lateral-2.jpg/') }}" />
                </div>
            </article>
        </section>
    </section>
@endsection