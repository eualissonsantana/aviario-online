@extends('layouts.app')

@section('content')    
    <section class="content-child aviario-noticias ">
        <article class="row justify-content-between px-md-3">
            <div class="col-sm-12 col-md-4 px-0">
                <h2>Notícias</h2>
            </div>
            
            <section class="row busca-box col-md-8 col-sm-12 justify-content-end mt-2 px-0">
                <div class="col-sm-12 col-md-3 mr-2 busca-categoria px-0 d-none d-sm-block">
                    <div class="input-group">
                        <form class="form-inline my-2 my-lg-0" action="{{route('posts.search')}}" method="POST">
                            @csrf
                            <div class="input-group-prepend">
                                <button class=" btn-busca-categoria" type="button submit">O</button>
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

                <div class="col-sm-12 col-md-5 busca-nome px-0 d-none d-sm-block">
                    <form class="form-inline my-2 my-lg-0" action="{{route('posts.search')}}" method="POST">
                        @csrf
                        <input type="text" hidden="true" name="option" value="titulo">
                        <input class="form-control mr-sm-2" type="search" placeholder="Pesquisar por uma parte do nome" name="filter" aria-label="Search">
                        <button hidden="true" class="btn btn-outline-success my-2 my-sm-0" type="submit">Buscar</button>
                    </form>
                </div>
                
            </section>
            <hr class="col-sm-11 col-md-12">
        </article>
        @csrf

        <ul>
            @foreach ($posts as $post)
                <li> 
                    <section class="row justify-content-between px-md-3">
                        <div class="row col-12 col-md-9 li-noticia">
                            <article class="col-6 col-md-4 imagem-noticia px-0">
                                <img src="{{ url('storage/imagens/chamadas/'.$post->imagem) }}"/> 
                            </article>
                            <article class="col-6 col-md-8 pl-4 d-flex align-content-between flex-wrap titulo-noticia">    
                                <div class="col-12">
                                    <h6> {{$post->categoria->descricao}} </h6>
                                    <h4 class="">{{$post->titulo}} </h4>
                                </div>
                                <div class="col-12 d-none d-sm-block previa">
                                    <p>{{$post->previa}}</p>
                                </div>
                                <div class="col-12">
                                    <p> {{$post->created_at}} </p>
                                </div>
                            </article>
                            <hr class="col-11 col-md-12">
                        </div>

                        
                    </section>
                </li>
            @endforeach
        </ul>
    </section>
@endsection