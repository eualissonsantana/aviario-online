@extends('layouts.app')
@section('title')
    Categorias de Notícia - Aviário Online
@stop
@section('content')
    <div class="padding-padrao pt post-categorias">
        <div class="row justify-content-between ">
            <div class="col-12 col-md-6 mt-md-2">
                <h2>Categorias de notícias</h2>
            </div>

            
            <div class="col-12 col-md-6 text-right">
                <a href="{{route("post_categorias.create")}}">
                    <button class="btn btn-novo">Nova</button>
                </a>
            </div>
        </div>
        
        <hr>
        @csrf
        <div>
            <ul>
                @foreach ($categorias as $cat)
                    <li>
                        <div class="row justify-content-between">
                            <div class="col-12 col-md-6">
                                <h5> {{$cat->descricao}} </h5>
                            </div>
                            <div class="row botoes col-12 col-md-4 justify-content-end ">
                                <div class="col-6 pl-0 pl-md-3">
                                    <a href="{{url("painel/noticias/categorias/$cat->id/edit")}}" class="">
                                        <button class="btn btn-full btn-primary">Editar</button>
                                    </a>
                                </div>
                                <div class="col-6 pr-0 pr-md-3">
                                    <a href="{{url("painel/noticias/categorias/$cat->id")}}" class="js-del-not-cat">
                                        <button class="btn btn-full btn-danger">Excluir</button>
                                    </a>
                                </div>
                            </div>
                            <hr class="mt-3 col-sm-11 col-md-12">

                        </div>
                    </li>
                @endforeach
            </ul>
        </div>
    </div>
@endsection