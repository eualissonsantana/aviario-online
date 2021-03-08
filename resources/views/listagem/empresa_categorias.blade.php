@extends('layouts.app', ['bannersCarousel' => $bannersRetangulares])

@section('content')
    <div class="padding-padrao pt painel-categorias-empresas">
        <article class="row justify-content-between ">
            <div class="col-12 col-md-6 mt-md-2">
                <h2>Categorias de comércio</h2>
            </div>
            
            <div class="col-12 col-md-6 text-right">
                <a href="{{route("empresa_categorias.create")}}">
                    <button class="btn btn-novo">Nova</button>
                </a>
            </div>
        </article>

        <hr>

        @csrf
            
        <article>
            <div class="accordion ramos-categorias " id="accordionExample">
                <div class="card">
                    <div class="card-header titulo-categoria text-left">
                        <h3>Ramos</h3>
                    </div>
                </div>
                @foreach ($ramos as $ramo)
                    <div class="card">
                        <div class="card-header pb-2" id="heading{{$ramo->id}}">
                            <a class="collapsed" href="#" data-toggle="collapse" data-target="#collapse{{$ramo->id}}" aria-expanded="true" aria-controls="{{$ramo->descricao}}">
                                <p class="mb-0 text-left">
                                    <strong>
                                        {{$ramo->descricao}}
                                    </strong>
                                </p>
                            </a>
                        </div>

                        @foreach ($categorias as $cat)
                            @if($cat->ramo->descricao == $ramo->descricao)
                                <div id="collapse{{$ramo->id}}" class="collapse" aria-labelledby="heading{{$ramo->id}}" data-parent="#accordionExample">
                                    <div class="card-body py-3">
                                        <div class="input-group-prepend row">
                                            <div class="col-md-9 col-sm-12 mb-0 text-left d-flex align-content-center flex-wrap">
                                                <h5> {{$cat->descricao}} </h5>
                                            </div>
                                            <article class="row botoes col-12 col-md-3 justify-content-end pr-3 pr-md-4">
                                                <div class="col-6 pl-0">
                                                    <a href="{{url("painel/empresas/categorias/$cat->id/edit")}}">
                                                        <button class="btn btn-sm btn-primary">Editar</button>
                                                    </a>
                                                </div>
                                                
                                                <div class="col-6 pr-0">
                                                    <a href="{{url("painel/empresas/categorias/$cat->id")}}" class=" js-del-emp-cat">
                                                        <button class="btn btn-sm btn-danger">Excluir</button>
                                                    </a>
                                                </div>
                                            </article>
                                        </div>  
                                    </div>
                                    <hr class="m-0">
                                </div>
                            @endif   
                        @endforeach
                    </div>    
                @endforeach
            </div>
        </article>
    </div>
@endsection