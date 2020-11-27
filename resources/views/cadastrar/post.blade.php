@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>@if(isset($post))Editar @else Cadastrar @endif</h1>

        @if(isset($post))
            <form action = "{{ url("noticias/$post->id")}}" method = "POST" enctype="multipart/form-data">
                @method('PUT')
        @else
            <form action = "{{ route('posts.store') }}" method = "POST" enctype="multipart/form-data">
        @endif

            @csrf
            <div class="form-group row">
                <label for="titulo" class="col-md-4 col-form-label text-md-right">{{ __('Titulo') }}</label>

                <div class="col-md-6">
                    <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{$post->titulo ?? ''}}" required autocomplete="titulo" autofocus>

                    @error('titulo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="previa" class="col-md-4 col-form-label text-md-right">{{ __('previa') }}</label>

                <div class="col-md-6">
                    <input id="previa" type="text" class="form-control @error('previa') is-invalid @enderror"  name="previa" value="{{$post->previa ?? ''}}" >

                    @error('previa')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <textarea name="conteudo" { id="myTextarea">{{$post->conteudo ?? ''}}</textarea>

            <div class="form-group row">
                <label for="arquivo" class="col-md-4 col-form-label text-md-right">{{ __('arquivo') }}</label>

                <div class="col-md-6">
                    <input id="arquivo" type="file" name="imagem" class="form-control @error('arquivo') is-invalid @enderror"  name="arquivo" value="{{$post->arquivo ?? ''}}">

                    @error('arquivo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
             
            <div class="form-group row">
                <label for="Categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>

                <div class="col-md-6">
                    <input id="categoria" type="text" class="form-control @error('categoria') is-invalid @enderror"  name="categoria_id" value="{{$post->categoria_id ?? ''}}" required autocomplete="categoria" autofocus>

                    @error('categoria')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="usuario_id" class="col-md-4 col-form-label text-md-right">{{ __('Usuário') }}</label>

                <div class="col-md-6">
                    <input id="usuario_id" type="text" class="form-control @error('usuario_id') is-invalid @enderror"  name="usuario_id" value="{{$post->usuario_id ?? ''}}" required autocomplete="categoria" autofocus>

                    @error('usuario_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection