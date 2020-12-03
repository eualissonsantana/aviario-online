@extends('layouts.app')

@section('content')
    
    <div class="content-child">
        <article class="row px-3 justify-content-between ">
            <div class="">
                <h2>Categorias de notícias</h2>
            </div>
            
            <section class="row col-6 justify-content-end mt-2">
                <a href="{{route("post_categorias.create")}}">
                    <button class="btn btn-cadastrar">Nova</button>
                </a>
            </section>
        </article>
        <hr>
        @csrf
        @foreach ($categorias as $cat)
            <div class="row p-0 justify-content-between">
                <div class="col-10">
                    <h5> {{$cat->descricao}} </h5>
                </div>
                <div class="row col-2">
                    <a href="{{url("painel/noticias/categorias/$cat->id/edit")}}">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                    <a href="{{url("painel/noticias/categorias/$cat->id")}}" class="ml-2 js-del-not-cat">
                        <button class="btn btn-danger">Excluir</button>
                    </a>
                </div>
            </div>
            <hr class="mt-1">
        @endforeach
    </div>
@endsection