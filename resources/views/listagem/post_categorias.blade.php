@extends('layouts.app')

@section('content')
    
    <div class="content-child post-categorias">
        <div class="row px-md-3 justify-content-between ">
            <div class="">
                <h2>Categorias de notícias</h2>
            </div>
            
            <section class="col-md-6 col-sm-12 justify-content-end mt-2 px-0">
                <a href="{{route("post_categorias.create")}}">
                    <button class="btn btn-cadastrar">Nova</button>
                </a>
            </section>
            <hr class="col-sm-11 col-md-12">
        </div>
        @csrf
        <ul>
            @foreach ($categorias as $cat)
                <li>
                    <div class="row justify-content-between px-md-3">
                        <div class="col-md-10 col-sm-12 px-0">
                            <h5> {{$cat->descricao}} </h5>
                        </div>
                        <div class="row justify-content-between mt-2 px-0">
                            <div class="col-6">
                                <a href="{{url("painel/noticias/categorias/$cat->id/edit")}}" class="">
                                    <button class="btn btn-editar">Editar</button>
                                </a>
                            </div>
                            <div class="col-6">
                                <a href="{{url("painel/noticias/categorias/$cat->id")}}" class="js-del-not-cat">
                                    <button class="btn btn-excluir">Excluir</button>
                                </a>
                            </div>
                        </div>
                        <hr class="mt-3 col-sm-11 col-md-12">

                    </div>
                </li>
            @endforeach
        </ul>
    </div>
@endsection