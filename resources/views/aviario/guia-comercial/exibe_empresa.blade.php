@extends('layouts.app')

@section('content')
    <section class="padding-padrao exibe-noticia">
        <p></p>
        <section class="row">
            <article class="col-7">
                <h3> {{$empresa->categoria->descricao}} </h3>
                <h1> {{$empresa->nome}} </h1>
                <h4 class="mt-3"> {{$empresa->descricao}} </h4>
                <hr>
            </article>
        </section>
        
    </section>
@endsection