@extends('layouts.app')

@section('content')    
    <section class="container-fluid content-child painel-noticias">
        <article class="row px-3 justify-content-between ">
            <div class="">
                <h2>Notícias</h2>
            </div>
            
            <section class="row col-8 justify-content-end mt-2">
                <div class="mr-2 busca-categoria">
                    <div class="input-group">
                        <form class="form-inline my-2 my-lg-0" action="{{route('posts.search')}}" method="POST">
                            @csrf
                            <div class="input-group-prepend">
                                <button class="btn btn-busca-categoria" type="button submit">O</button>
                            </div>
                            <select class="custom-select" id="inputGroupSelect03" name="filter">
                                @foreach($categorias as $cat)
                                    <option value="{{$cat->id}}">{{$cat->descricao}}</option>
                                @endforeach
                            </select>
                            <input type="text" hidden="true" name="option" value="categoria">
                        </form>
                    </div>
                </div>

                <div class="busca-nome">
                    <form class="form-inline my-2 my-lg-0" action="{{route('posts.search')}}" method="POST">
                        @csrf
                        <input type="text" hidden="true" name="option" value="titulo">
                        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar por uma parte do nome" name="filter" aria-label="Search">
                        <button hidden="true" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
    
                <a href="{{route("posts.create")}}">
                    <button class="btn btn-cadastrar">Novo</button>
                </a>
            </section>
        </article>
        <hr>
        
        @csrf
        @foreach ($posts as $post)
            <section class="row">
                <article class="col-10">
                    <h3 class="">{{$post->titulo}} </h3>
                    <h5>{{$post->previa}} </h5>
                    <img src="{{ url('storage/imagens/chamadas/'.$post->imagem) }}" style="max-width: 400px " /> 
                </article>
                <article class="botoes col-2 row justify-content-end">
                    <a href="{{url("noticias/$post->id/edit")}}">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                    <a href="{{url("noticias/$post->id")}}" class="ml-2 js-del-post">
                        <button class="btn btn-danger">Excluir</button>
                    </a>
                </article>
            </section>
            <hr>
        @endforeach
    </section>
@endsection