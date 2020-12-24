@extends('layouts.app')

@section('content')
    <section class="content-child painel-banners px-0">
        <article class="row px-md-3 justify-content-between ">
            <div class="">
                <h2>Banners</h2>
            </div>
            
            <section class="m-auto row col-md-10 col-sm-12 justify-content-end mt-2 px-0">
                <div class="busca-nome d-none d-sm-block">
                    <form class="form-inline my-2 my-lg-0" action="{{route('empresas.search')}}" method="POST">
                        @csrf
                        <input type="text" hidden="true" name="option" value="nome">
                        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar por uma parte do nome" name="filter" aria-label="Search">
                        <button hidden="true" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
    
                <div class="col-sm-12 col-md-1 justify-content-end px-0">
                    <a href="{{route("banners.create")}}">
                        <button class="btn btn-cadastrar">Novo</button>
                    </a>
                </div>
            </section>
            <hr class="col-sm-11 col-md-12">
        </article>

        
        @csrf
        <ul>
            @foreach ($banners as $banner)
                @if($banner)
                    <li>
                        <section class="row justify-content-between">
                            <h3> {{$banner->titulo}} </h3>

                            <article class="botoes col-md-2 col-12 row mt-3 px-0">
                                <a href="{{url("painel/banners/$banner->id/edit")}}">
                                    <button class="btn btn-editar">Editar</button>
                                </a>
                                <a href="{{url("painel/banners/$banner->id")}}" class="ml-2 js-del-emp">
                                    <button class="btn btn-excluir">Excluir</button>
                                </a>
                            </article>
                            <hr class="col-sm-11 col-md-12">
                        </section>
                    </li>
                @endif
            @endforeach
        </ul>
    </section>
@endsection