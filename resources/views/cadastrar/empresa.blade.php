@extends('layouts.app')

@section('content')
    <section class="content-child empresa">
        <section class="card">
            <article class="card-body">
        
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
                    
                    <article class="row">
                        <div class="form-group col-md-6 col-form-label text-md-left">
                            <label for="name" class="col-form-label">Nome do comércio ou profissional *</label>            
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="nome" value="{{$empresa->nome ?? ''}}" required autocomplete="name" autofocus>
            
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="col-md-6 col-form-label text-md-left">
                            <label for="slogan" class="col-form-label">{{ __('Slogan') }}</label> 
                            <input id="slogan" type="text" class="form-control @error('slogan') is-invalid @enderror"  name="slogan" value="{{$empresa->slogan ?? ''}}" >
            
                            @error('slogan')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </article>

                    <article class="row ">
                        <div class="input-group col-md-6">
                            <div class="input-group-prepend">
                                <label class="input-group-text" for="categoria_id">Categoria</label>
                            </div>
                            <select class="custom-select" id="categoria_id" name="categoria_id">
                                @foreach($categorias as $cat) 
                                    @if(isset($empresa))
                                        @if($cat->id != $empresa->categoria->id)
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

                        <div class="input-group col-md-6">
                            <div class="input-group-prepend">
                            <span class="input-group-text">Imagem</span>
                            </div>
                            <div class="custom-file arquivo">
                                <input id="arquivo" type="file" name="imagem" class="custom-file-input" @error('arquivo') is-invalid @enderror  name="arquivo" value="{{$empresa->imagem ?? ''}}">
                                <label class="custom-file-label" for="inputGroupFile01">Carregar imagem</label>
                                
                                @error('arquivo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                    </article>

                    <article class="row">
                        <div class="form-group col-12 col-form-label text-md-left pb-0">
                            <label for="descricao" class="col-form-label">Descrição (Um pouco mais sobre o comércio ou o serviço prestado)</label>
                            <textarea autocomplete="on" id="descricao" type="text" rows="5" class="form-control @error('descricao') is-invalid @enderror"  name="descricao">{{$empresa->descricao ?? ''}}</textarea>
            
                            @error('descricao')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </article>

                    <article class="row">
                        <div class="form-group col-4 col-form-label text-md-left">
                            <label for="telefone" class="col-form-label">Telefone/Celular *</label>
                            <input id="telefone" type="text" class="form-control @error('telefone') is-invalid @enderror"  name="telefone" value="{{$empresa->telefone ?? ''}}" required autocomplete="telefone" autofocus>
                            <input type="checkbox" class="mt-2" name="ehWhats" value="1" @if(isset($empresa) && $empresa->ehWhats) checked @endif>
                            <small>Marque aqui se o número for Whats App</small>
                            
                            @error('telefone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-4 col-form-label text-md-left">
                            <label for="email" class="col-form-label">Email</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{$empresa->email ?? ''}}">

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-4 col-form-label text-md-left">
                            <label for="facebook" class="col-form-label">Facebook</label>
                            <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" value="{{$empresa->facebook ?? ''}}">

                            @error('facebook')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </article>

                    <article class="row">
                        <div class="form-group col-4 col-form-label text-md-left">
                            <label for="youtube" class="col-form-label">Youtube</label>
                            <input id="youtube" type="text" class="form-control @error('youtube') is-invalid @enderror"  name="youtube" value="{{$empresa->youtube ?? ''}}">

                            @error('youtube')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror 
                        </div>
            
                        <div class="form-group col-4 col-form-label text-md-left">
                            <label for="instagram" class="col-form-label">Instagram</label>
                            <input id="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror"  name="instagram" value="{{$empresa->instagram ?? ''}}">

                            @error('instagram')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        
                        <div class="form-group col-4 col-form-label text-md-left">
                            <label for="Formas de pagamento" class="col-form-label">Formas de pagamento <small>(selecione as formas aceitas)</small></label>
            
                            <div class="row p-2 pl-3">
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="aceitaBoleto" id="inlineCheckbox1" value="1" @if(isset($empresa) && $empresa->aceitaBoleto == 1) checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox1">Boleto</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="aceitaCredito" id="inlineCheckbox1" value="1" @if(isset($empresa) && $empresa->aceitaCredito) checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox1">Crédito</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="aceitaDebito" id="inlineCheckbox1" value="1" @if(isset($empresa) && $empresa->aceitaDebito) checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox1">Débito</label>
                                </div>
                                <div class="form-check form-check-inline">
                                    <input class="form-check-input" type="checkbox" name="aceitaDinheiro" id="inlineCheckbox1" value="1" @if(isset($empresa) && $empresa->aceitaDinheiro) checked @endif>
                                    <label class="form-check-label" for="inlineCheckbox1">Dinheiro</label>
                                </div>
                            </div>
                        </div>   
                    </article>

                    <hr>
                    <h3>Endereço</h3>

                    <article class="row">
                        <div class="form-group col-2 col-form-label text-md-left">
                            <label for="Estado" class="col-form-label">Estado</label>
                            <input id="estado" type="text" class="form-control @error('estado') is-invalid @enderror" value="BA" name="estado" required autocomplete="estado" autofocus>
            
                            @error('estado')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-4 col-form-label text-md-left">
                            <label for="cidade" class="col-form-label">Cidade</label>
                            <input id="cidade" type="text" class="form-control @error('cidade') is-invalid @enderror"  name="cidade" value="Feira de Santana" autofocus>
            
                            @error('cidade')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-3 col-form-label text-md-left">
                            <label for="Bairro" class="col-form-label">Bairro</label>
                            <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="{{$empresa->endereco->bairro ?? 'Aviário'}}" required autocomplete="bairro" autofocus>
            
                            @error('bairro')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-3 col-form-label text-md-left">
                            <label for="CEP" class="col-form-label">CEP</label>
                            <input id="cep" type="text" class="form-control @error('cep') is-invalid @enderror"  name="cep" value="{{$empresa->endereco->cep ?? ''}}">
            
                            @error('cep')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </article>

                    <article class="row">
                        <div class="form-group col-5 col-form-label text-md-left">
                            <label for="Bairro" class="col-form-label">Rua/Logradouro</label>
                            <input id="rua" type="text" class="form-control @error('rua') is-invalid @enderror" value="{{$empresa->endereco->rua ?? ''}}" name="rua" >

                            <div class="form-check mt-2">
                                <input class="form-check-input" type="checkbox" name="ehComercial" id="inlineCheckbox1" value="1" @if(isset($empresa) && $empresa->endereco->ehComercial) checked @endif>
                                <label class="form-check-label" for="inlineCheckbox1">Marque aqui se esse for um endereço comercial</label>
                            </div>

                            @error('rua')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>
            
                        <div class="form-group col-3 col-form-label text-md-left">
                            <label for="Numero" class="col-form-label">Número</label>
                            <input id="numero" type="number" class="form-control @error('rua') is-invalid @enderror"  name="numero" value="{{$empresa->endereco->numero ?? ''}}">

                            @error('numero')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </article>
                    
                    <div class="row col-12 justify-content-end">
                        <button type="submit" class="btn btn-salvar">Salvar</button>
                    </div>
                </form>
            </article>
        </section>
    </section>
@endsection