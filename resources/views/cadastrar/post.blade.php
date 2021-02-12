@extends('layouts.app')

@section('content')
    <div class="padding-padrao pt painel-nova-noticia">
        <section class="card">
            <article class="card-body">
                <h2>
                    @if(isset($post))
                        Editar notícia
                    @else 
                        Nova notícia 
                    @endif
                </h2>

                @if(isset($post))
                    <form action = "{{ url("painel/noticias/$post->id")}}" method = "POST" enctype="multipart/form-data">
                        @method('PUT')
                @else
                    <form action = "{{ route('posts.store') }}" method = "POST" enctype="multipart/form-data">
                @endif

                    @csrf

                    <div class="form-group col-form-label text-md-left">
                        <label for="titulo" class="col-form-label">{{ __('Titulo') }}</label>
                        <input id="titulo" type="text" class="form-control @error('titulo') is-invalid @enderror" name="titulo" value="{{$post->titulo ?? ''}}" required autocomplete="titulo" autofocus>

                        @error('titulo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-group col-form-label text-md-left">
                        <label for="previa" class="col-form-label">Prévia</label>
                        <input id="previa" type="text" class="form-control @error('previa') is-invalid @enderror" name="previa" value="{{$post->previa ?? ''}}" >

                        @error('previa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                       
                    </div>

                    <article class="row">
                        <div class="form-group col-md-4 text-md-left align-self-end">
                            <label for="arquivo" class="col-form-label">Imagem</label>
                            <input id="arquivo" type="file" name="imagem" class="form-control @error('arquivo') is-invalid @enderror" name="arquivo" value="{{$post->arquivo ?? ''}}">

                            @error('arquivo')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="input-group form-group col-md-4 categoria align-self-end">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="categoria_id">Categoria</label>
                            </div>
                            
                            <select class="custom-select" id="categoria_id" name="categoria_id">
                                @foreach($categorias as $cat) 
                                    @if(isset($post))
                                        @if($cat->id != $post->categoria_id)
                                            <option value="{{$cat->id}}">{{$cat->descricao}}</option>
                                        @else
                                            <option selected value="{{$cat->id}}">{{$cat->descricao}}</option>
                                        @endif
                                    @else
                                        <option value="{{$cat->id}}">{{$cat->descricao}}</option>   
                                    @endif
                                @endforeach
                            </select>

                            @error('categoria_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           
                        </div>
    
                        <div class="form-group col-md-4 text-md-left">
                            <label for="autor" class="col-form-label">Autor</label>
                            <input id="autor" type="text" class="form-control @error('autor') is-invalid @enderror" name="autor" value="{{$post->autor ?? ''}}" required autocomplete="autor" autofocus> 
                            <input type="text" hidden="true" name="usuario_id" value="{{Auth::user()->id}}">
                            
                            @error('autor')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>
                    </article>

                    <div class="form-group col-form-label text-md-left">
                        <label for="conteudo" class="col-form-label">Conteúdo</label>
                        <textarea name="conteudo" id="myTextarea" {{$post->conteudo ?? ''}} class="form-control @error('conteudo') is-invalid @enderror"> </textarea>

                        @error('conteudo')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>


                    <div class="row mt-2 justify-content-end my-3">
                        <div class="col-6 col-md-2">
                            <a href="{{ route('posts.index') }}" class="btn btn-full btn-secondary mt-2"> Cancelar </a>
                        </div> 

                        <div class="col-6 col-md-2 ">
                            <button type="submit" class="btn btn-enviar mt-2">Salvar</button>
                        </div> 
                    </div>
                </form>
            </article>
        </section>
    </div>
@endsection