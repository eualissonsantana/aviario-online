@extends('layouts.app', ['bannersCarousel' => $bannersRetangulares])

@section('content')
    <div class="padding-padrao pt">
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
                            <input id="arquivo" type="file" name="imagem" class="form-control @error('arquivo') is-invalid @enderror"  name="arquivo" value="{{$banner->arquivo ?? ''}}" @if(!isset($banner)) required  autofocus @endif>
    
                            @error('arquivo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="row">
                        <div class="form-group col-md-3 col-form-label text-md-left ">
                            <label for="" class="col-form-label">Posição na tela</label>
                            <div class="row col-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="posicao" id="topo" value="topo" @if(isset($banner) && $banner->posicao == 'topo') checked @endif>
                                    <label class="form-check-label" for="topo">Retangular</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="posicao" id="inlineCheckbox1" value="lado" @if(isset($banner) && $banner->posicao == 'lado') checked @endif>
                                    <label class="form-check-label" for="lado">Quadrado</label>
                                </div>
                            </div>
                        </div>

                        <div class="form-group col-md-2 col-form-label text-md-left ">
                            <label for="" class="col-form-label">Situação do Banner</label>
                            <div class="row col-12">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ativo" id="inlineRadio1" value="1" @if(isset($banner) && $banner->ativo == '1') checked @endif>
                                    <label class="form-check-label" for="inlineRadio1">Ativo</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="radio" name="ativo" id="inlineRadio2" value="0" @if(isset($banner) && $banner->ativo == '0') checked @endif>
                                    <label class="form-check-label" for="inlineRadio2">Inativo</label>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="row justify-content-end px-0 px-md-3 my-3">
                        <div class="col-6 col-md-2">
                            <a href="{{ route('banners.index') }}" class="btn btn-full btn-secondary mt-2"> Cancelar </a>
                        </div>
                        <div class="col-6 col-md-2">
                            <button type="submit" class="btn btn-full btn-salvar mt-2">Salvar</button>
                        </div>
                        
                    </div>
                </form>
            </article>
        </section>
    </div>
@endsection