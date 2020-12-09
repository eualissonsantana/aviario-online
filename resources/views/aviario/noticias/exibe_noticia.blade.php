@extends('layouts.app')

@section('content')
    <section class="content-child exibe-noticia">
        <p></p>
        <section class="row">
            <article class="col-7">
                <h3> {{$post->categoria->descricao}} </h3>
                <h1> {{$post->titulo}} </h1>
                <h4 class="mt-3"> {{$post->previa}} </h4>
                <hr>
            </article>
        </section>
        
    </section>
@endsection