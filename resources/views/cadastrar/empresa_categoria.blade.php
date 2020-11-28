@extends('layouts.app')

@section('content')
    <div class="container">
        <h1>@if(isset($categoria))Editar @else Cadastrar @endif</h1>

        @if(isset($categoria))
            <form action = "{{ url("painel/empresas/categorias/$categoria->id")}}" method = "POST">
                @method('PUT')
        @else
            <form action = "{{ route('empresa_categorias.create') }}" method = "POST">
        @endif

            @csrf
            <div class="form-group row">
                <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('Descrição') }}</label>

                <div class="col-md-6">
                    <input id="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror" name="descricao" value="{{$categoria->descricao ?? ''}}" required autocomplete="descricao" autofocus>

                    @error('descricao')
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