@extends('layouts.app')

@section('content')
    <div class="content-child painel-nova-categoria-empresa">
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
                    <form action = "{{ url("painel/empresas/categorias/$categoria->id")}}" method = "POST">
                        @method('PUT')
                @else
                    <form action = "{{ route('empresa_categorias.create') }}" method = "POST">
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
                    <div class="row pr-3 justify-content-end">
                        <button type="submit" class="btn btn-salvar">Salvar</button>
                    </div>
                </form>
            </article>
        </section>
    </div>
@endsection