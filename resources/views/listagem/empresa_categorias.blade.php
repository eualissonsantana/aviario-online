@extends('layouts.app')

@section('content')
    <div class="content-child painel-categorias-empresas">
        <article class="row px-md-3 justify-content-between ">
            <div class="">
                <h2>Categorias de comércio</h2>
            </div>
            
            <section class="m-auto row col-md-6 col-12 justify-content-end mt-2 px-0">
                <div class="mr-2 busca-categoria d-none d-sm-block">
                    <div class="input-group">
                        <form class="form-inline my-2 my-lg-0" action="{{route('ramos.search')}}" method="POST">
                            @csrf
                            <div class="input-group-prepend">
                                <button class="btn btn-busca-categoria" type="button submit">O</button>
                            </div>
                            <select class="custom-select" id="inputGroupSelect03" name="filter">
                                @foreach($ramos as $ramo)
                                    <option value="{{$ramo->id}}">{{$ramo->descricao}}</option>
                                @endforeach
                            </select>
                        </form>
                    </div>
                </div>
    
                <section class="col-md-6 col-sm-12 justify-content-end mt-2 px-0">
                    <a href="{{route("empresa_categorias.create")}}">
                        <button class="btn btn-cadastrar">Nova</button>
                    </a>
                </section>
            </section>
            <hr class="col-sm-11 col-md-12">
        </article>
        @csrf
        <ul>
            @foreach ($categorias as $cat)
                <li> 
                    <div class="row justify-content-between ">
                        <div class="col-md-9 col-sm-12 px-0">
                            <h6> {{$cat->ramo->descricao}} </h6>
                            <h5> {{$cat->descricao}} </h5>
                        </div>
                        <article class="col-md-2 col-sm-12 row justify-content-between mt-3 pr-1">
                            <a href="{{url("painel/empresas/categorias/$cat->id/edit")}}">
                                <button class="btn btn-editar">Editar</button>
                            </a>
                            <a href="{{url("painel/empresas/categorias/$cat->id")}}" class="ml-2 js-del-emp-cat">
                                <button class="btn btn-excluir">Excluir</button>
                            </a>
                        </article>
                        <hr class="col-sm-11 col-md-12">
                    </div>
                </li>
            @endforeach
        </ul>

        
    </div>
@endsection