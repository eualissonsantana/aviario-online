@extends('layouts.app')

@section('content')
    
    <div class="container col-md-8 col-12">
        <h2>Notícias</h2>
        <hr>
        @csrf
        @foreach ($posts as $post)
            <div class="row">
                <div class="col-9">
                    <img src="{{ url('storage/imagens/chamadas/'.$post->imagem) }}" style="max-width: 650px " />
                    <h1 class="mt-2">{{$post->titulo}} </h1>
                    <h3>{{$post->previa}} </h3>
                    <hr>
                    {!! $post->conteudo !!}
                </div>
                <div class="col">
                    <a href="{{url("noticias/$post->id/edit")}}">
                        <button class="btn btn-primary">Editar</button>
                    </a>
                    <a href="{{url("noticias/$post->id")}}" class="js-del-post">
                        <button class="btn btn-danger">Excluir</button>
                    </a>
                </div>
            </div>
            <hr>
        @endforeach
    </div>
@endsection