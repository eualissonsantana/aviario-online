@extends('layouts.app')

@section('content')
    <div class="content-child">
        <h2>
            @if(isset($empresa))
                Editar
            @else 
                Cadastrar 
            @endif
        </h2>

        @if(isset($empresa))
            <form action = "{{ url("empresas/$empresa->id")}}" method = "POST" enctype="multipart/form-data">
                @method('PUT')
        @else
            <form action = "{{ route('empresas.create') }}" method = "POST" enctype="multipart/form-data">
        @endif

            @csrf
            
            <section class="row">
                <div class="form-group col-md-4 col-form-label text-md-left">
                    <label for="arquivo" class="col-form-label">{{ __('Imagem') }}</label>
                    <input id="arquivo" type="file" name="imagem" class="form-control @error('arquivo') is-invalid @enderror"  name="arquivo" value="{{$empresa->arquivo ?? ''}}">
    
                    @error('arquivo')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
    
                <div class="form-group col-md-8 col-form-label text-md-left">
                    <label for="name" class="col-form-label">{{ __('Nome do comércio ou profissional') }}</label>            
                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="nome" value="{{$empresa->nome ?? ''}}" required autocomplete="name" autofocus>
    
                    @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </section>




            <div class="form-group row">
                <label for="slogan" class="col-md-4 col-form-label text-md-right">{{ __('slogan') }}</label>

                <div class="col-md-6">
                    <input id="slogan" type="text" class="form-control @error('slogan') is-invalid @enderror"  name="slogan" value="{{$empresa->slogan ?? ''}}" >

                    @error('slogan')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>


            <div class="form-group row">
                <label for="descricao" class="col-md-4 col-form-label text-md-right">{{ __('descricao') }}</label>

                <div class="col-md-6">
                    <input id="descricao" type="text" class="form-control @error('descricao') is-invalid @enderror"  name="descricao" value="{{$empresa->descricao ?? ''}}">

                    @error('descricao')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="telefone" class="col-md-4 col-form-label text-md-right">{{ __('telefone') }}</label>

                <div class="col-md-6">
                    <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror"  name="telefone" value="{{$empresa->telefone ?? ''}}" required autocomplete="telefone" autofocus>
                    <input type="checkbox"  name="ehWhats" value="1" aria-label="Marque aqui se o número for Whats App">
                    <small>Marque aqui se o número for Whats App</small>
                   
                    @error('telefone')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Email') }}</label>

                <div class="col-md-6">
                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{$empresa->email ?? ''}}">

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="youtube" class="col-md-4 col-form-label text-md-right">{{ __('youtube') }}</label>

                <div class="col-md-6">
                    <input id="youtube" type="text" class="form-control @error('youtube') is-invalid @enderror"  name="youtube" value="{{$empresa->youtube ?? ''}}">

                    @error('youtube')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="instagram" class="col-md-4 col-form-label text-md-right">{{ __('instagram') }}</label>

                <div class="col-md-6">
                    <input id="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror"  name="instagram" value="{{$empresa->instagram ?? ''}}">

                    @error('instagram')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="facebook" class="col-md-4 col-form-label text-md-right">{{ __('facebook') }}</label>

                <div class="col-md-6">
                    <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror"  name="facebook" value="{{$empresa->facebook ?? ''}}">

                    @error('facebook')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="Formas de pagamento" class="col-md-4 col-form-label text-md-right">{{ __('Formas de pagamento') }}</label>

                <div class="col-md-6 p-2 pl-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="aceitaBoleto" id="inlineCheckbox1" value="1">
                        <label class="form-check-label" for="inlineCheckbox1">Boleto</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="aceitaCredito" id="inlineCheckbox1" value="1">
                        <label class="form-check-label" for="inlineCheckbox1">Crédito</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="aceitaDebito" id="inlineCheckbox1" value="1">
                        <label class="form-check-label" for="inlineCheckbox1">Débito</label>
                    </div>
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="aceitaDinheiro" id="inlineCheckbox1" value="1" checked>
                        <label class="form-check-label" for="inlineCheckbox1">Dinheiro</label>
                    </div>
                </div>
            </div>   
             
            <div class="form-group row">
                <label for="Categoria" class="col-md-4 col-form-label text-md-right">{{ __('Categoria') }}</label>

                <div class="col-md-6">
                    <input id="categoria" type="text" class="form-control @error('categoria') is-invalid @enderror"  name="categoria_id" value="{{$empresa->categoria_id ?? ''}}" required autocomplete="categoria" autofocus>

                    @error('categoria')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <hr>
            <h2>Endereço</h2>

            <div class="form-group row">
                <label for="Bairro" class="col-md-4 col-form-label text-md-right">{{ __('Bairro') }}</label>

                <div class="col-md-6">
                    <input id="bairro" type="text" class="form-control @error('categoria') is-invalid @enderror"  name="bairro" value="Aviário" required autocomplete="bairro" autofocus>

                    @error('bairro')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="Bairro" class="col-md-4 col-form-label text-md-right">{{ __('Rua') }}</label>

                <div class="col-md-6">
                    <input id="rua" type="text" class="form-control @error('rua') is-invalid @enderror"  name="rua" >

                    @error('rua')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="Bairro" class="col-md-4 col-form-label text-md-right">{{ __('CEP') }}</label>

                <div class="col-md-6">
                    <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror"  name="cep">

                    @error('cep')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="Bairro" class="col-md-4 col-form-label text-md-right">{{ __('Número') }}</label>

                <div class="col-md-6">
                    <input id="numero" type="number" class="form-control @error('rua') is-invalid @enderror"  name="numero">

                    @error('rua')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="Bairro" class="col-md-4 col-form-label text-md-right">{{ __('Cidade') }}</label>

                <div class="col-md-6">
                    <input id="cidade" type="text" class="form-control @error('rua') is-invalid @enderror"  name="cidade" value="Feira de Santana" autofocus>

                    @error('cidade')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="Estado" class="col-md-4 col-form-label text-md-right">{{ __('Estado') }}</label>

                <div class="col-md-6">
                    <input id="estado" type="text" class="form-control @error('estado') is-invalid @enderror" value="BA" name="estado" required autocomplete="estado" autofocus>

                    @error('estado')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label for="É comercial" class="col-md-4 col-form-label text-md-right">{{ __('É comercial') }}</label>

                <div class="col-md-6 p-2 pl-3">
                    <div class="form-check form-check-inline">
                        <input class="form-check-input" type="checkbox" name="ehComercial" id="inlineCheckbox1" value="1">
                        <label class="form-check-label" for="inlineCheckbox1">Boleto</label>
                    </div>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection