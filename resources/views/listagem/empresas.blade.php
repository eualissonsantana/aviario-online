@extends('layouts.app')

@section('content')
    
    <div class="content-child">
        <h2>Comércios</h2>
        <hr>
        @csrf
        @foreach ($empresas as $emp)
            <section class="row">
                <section class="col-2 imagem-comercio">
                    <img src="{{ url('storage/imagens/empresas/'.$emp->imagem) }}" style="max-width: 175px " />
                </section>
                <section class="col-8 dados-comercio">
                    <article class="mb-3">
                        <small><strong>{{$emp->categoria->descricao}}</strong></small>
                        <h3><strong>{{$emp->nome}}</strong></h3>
                        <h5>{{$emp->slogan}} </h5>
                    </article>
                    <article class="mb-3">
                        <p>
                            {{$emp->endereco->rua}}, {{$emp->endereco->numero}} <br> 
                            {{$emp->endereco->bairro}} - {{$emp->endereco->cep}} - {{$emp->endereco->cidade}}/{{$emp->endereco->estado}}
                        </p>
                    </article>
                    <article class="telefone">
                        <h5>{{$emp->telefone}}</h5>
                    </article>
                    
                </section>
                <div class="col">
                    <a href="{{url("empresas/$emp->id/edit")}}">
                        <button class="btn btn-editar">Editar</button>
                    </a>
                    <a href="{{url("empresas/$emp->id")}}" class="js-del-emp">
                        <button class="btn btn-excluir">Excluir</button>
                    </a>
                </div>
            </section>
            <hr>
        @endforeach
    </div>
@endsection