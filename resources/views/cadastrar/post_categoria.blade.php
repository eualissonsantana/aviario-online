@extends('layouts.app', ['bannersCarousel' => $bannersRetangulares])

@section('content')
    <div class="padding-padrao pt">
        <section class="card">
            <article class="card-body">
                <h2>
                    @if(isset($categoria))
                        Editar categoria
                    @else 
                        Cadastrar categoria
                    @endif
                </h2>

                @if(isset($categoria))
                    <form action = "{{ url("painel/noticias/categorias/$categoria->id")}}" method = "POST">
                        @method('PUT')
                @else
                    <form action = "{{ route('post_categorias.create') }}" method = "POST">
                @endif

                    @csrf
                    <div class="form-group">
                        <label for="descricao" class="col-form-label">Descrição</label>
                        <input id="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{$categoria->descricao ?? ''}}" required autocomplete="descricao" autofocus>

                        @error('descricao')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    
                    </div>
                    <div class="row justify-content-end px-0 my-3">
                        <div class="col-6 col-md-2">
                            <a href="{{ route('post_categorias.index') }}" class="btn btn-full btn-secondary mt-2"> Cancelar </a>
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