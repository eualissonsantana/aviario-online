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
                        <input id="previa" type="text" class="form-control @error('previa') is-invalid @enderror"  name="previa" value="{{$post->previa ?? ''}}" >

                        @error('previa')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                       
                    </div>

                    <article class="row">
                        <div class="form-group col-md-4 text-md-left align-self-end">
                            <label for="arquivo" class="col-form-label">Imagem</label>
                            <input id="arquivo" type="file" name="imagem" class="form-control @error('arquivo') is-invalid @enderror"  name="arquivo" value="{{$post->arquivo ?? ''}}">

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
                                            <option value="{{$cat->id}}">{{$cat->id}} - {{$cat->descricao}}</option>
                                        @else
                                            <option selected value="{{$cat->id}}">{{$cat->id}} - {{$cat->descricao}}</option>
                                        @endif
                                    @else
                                        <option value="{{$cat->id}}">{{$cat->id}} - {{$cat->descricao}}</option>   
                                    @endif
                                @endforeach
                            </select>

                            @error('categoria_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                           
                        </div>
    
                        <div class="input-group form-group col-md-4 autor align-self-end">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="usuario_id">Autor</label>
                            </div>

                            <select class="custom-select" id="usuario_id" name="usuario_id">
                                @foreach($usuarios as $user) 
                                    @if(isset($post))
                                        @if($user->id != $post->usuario_id)
                                            <option value="{{$user->id}}">{{$user->id}} - {{$user->name}}</option>
                                        @else
                                            <option selected value="{{$user->id}}">{{$user->id}} - {{$user->name}}</option>
                                        @endif
                                    @else
                                        <option value="{{$user->id}}">{{$user->id}} - {{$user->name}}</option>   
                                    @endif
                                @endforeach
                            </select>

                            @error('usuario_id')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            
                        </div>
                    </article>

                    <div class="form-group col-form-label text-md-left">
                        <label for="conteudo" class="col-form-label">Conteúdo</label>
                        <textarea name="conteudo" { id="myTextarea">{{$post->conteudo ?? ''}}</textarea>
                    </div>


                    <div class="row mt-2 justify-content-end">
                        <div class="col-12 col-md-3">
                            <button type="submit" class="btn btn-enviar">Salvar</button>
                        </div> 
                    </div>
                </form>
            </article>
        </section>
    </div>
@endsection