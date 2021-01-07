@extends('layouts.app')

@section('content')    
    <section class="padding-padrao guia-comercial">
        <article class="row justify-content-between px-md-3">
            <div class="col-sm-12 col-md-6 px-0">
                <h2>Guia Comercial do Aviário</h2>
            </div>
        </article>
        <hr>
        
        <section class="row categorias">
            @foreach ($ramos as $ramo)
                <div class="ramo col-12 col-md-3 mb-4">
                    <h4 class="mb-3"> {{$ramo->descricao}} </h4>
                    <ul>
                        @foreach ($categorias as $cat)
                            @if($cat->ramo->descricao == $ramo->descricao)
                                <li> 
                                    <a href="{{route('guia.categoria', $cat->id)}}"> {{$cat->descricao}}  </a> 
                                </li>
                                <hr class="my-1 p-0 mx-0 col-10 align-item-start">
                            @endif
                        @endforeach
                    </ul>
                </div>

            @endforeach
        </section>
            
    </section>
@endsection