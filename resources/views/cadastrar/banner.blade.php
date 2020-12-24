@extends('layouts.app')

@section('content')
    <div class="content-child">
        <section class="card">
            <article class="card-body">
                <h2>
                    @if(isset($banner))
                        Editar banner
                    @else 
                        Cadastrar banner
                    @endif
                </h2>

                @if(isset($banner))
                    <form action = "{{ url("painel/banners/$banner->id")}}" method = "POST" enctype="multipart/form-data">
                        @method('PUT')
                @else
                    <form action = "{{ route('banners.create') }}" method = "POST" enctype="multipart/form-data">
                @endif

                    @csrf
                    <div class="row">
                        <div class="form-group col-md-6">
                            <label for="titulo" class="col-form-label">Título</label>
                            <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{$banner->titulo ?? ''}}" required autocomplete="titulo" autofocus>
    
                            @error('titulo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
    
                        <div class="form-group col-md-4 text-md-left align-self-end">
                            <label for="arquivo" class="col-form-label">Imagem</label>
                            <input id="arquivo" type="file" name="imagem" class="form-control @error('arquivo') is-invalid @enderror"  name="arquivo" value="{{$post->arquivo ?? ''}}">
    
                            @error('arquivo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-md-2 col-form-label text-md-left ">
                            <label for="" class="col-form-label">Posição na tela</label>
                            <div class="row col-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="posicao" id="topo" value="topo" @if(isset($banner) && $banner->posicao == 'topo') checked @endif>
                                    <label class="form-check-label" for="topo">Topo</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="posicao" id="inlineCheckbox1" value="lado" @if(isset($banner) && $banner->posicao == 'lado') checked @endif>
                                    <label class="form-check-label" for="lado">Lado</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-end px-0">
                        <div class="row col-4 justify-content-between">
                            <button type="submit" class="btn btn-salvar">Cancelar</button>
                            <button type="submit" class="btn btn-salvar">Salvar</button>
                        </div>
                    </div>
                </form>
            </article>
        </section>
    </div>
@endsection