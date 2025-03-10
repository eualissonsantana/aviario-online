<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Open+Sans:wght@400;600&display=swap" rel="stylesheet">
    

    <script src="{{ url('js/mask.js') }}" ></script>

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/painel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/painel-mobile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aviario.css') }}" rel="stylesheet">
    <title>Cadastre-se - Aviário Online</title>
</head>
<body>
    <section class="container formulario">
        <div class="text-center">
            <img src="{{ url('img/logo-formulario.png') }}" alt="Logo Aviário Online" width="300px">
        </div>
        
        <section class="content-child empresa">
            <section class="card mb-5 mt-3">
                <article class="card-body">
            
                        <h2 >Cadastre-se</h2>
                        <small class="ml-1">Os campos com asterisco (*) são obrigatórios</small>
            

                        <form action = "{{ route('empresas.cadastrar-comercio') }}" method = "POST" enctype="multipart/form-data">
                   
                        @csrf
                        
                        <article class="row">
                            <div class="form-group col-md-6 col-form-label text-md-left">
                                <label for="name" class="col-form-label">Nome do comércio ou profissional * </label>            
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="nome" placeholder="Ex: Rosa Doceria" required autocomplete="name" autofocus>
                
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-md-6 col-form-label text-md-left">
                                <label for="slogan" class="col-form-label">{{ __('Slogan') }}</label> 
                                <input id="slogan" type="text" class="form-control @error('slogan') is-invalid @enderror"  name="slogan" placeholder="Ex: Doces com gosto de felicidade" >
                
                                @error('slogan')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </article>

                        <article class="row ">
                            <div class="col-md-6 col-form-label text-md-left">
                                
                                <label class="col-form-label" for="categoria_id">Categoria</label>
                                
                                <select class="custom-select" id="categoria_id" name="categoria_id">
                                    @foreach($categorias as $cat) 
                                        @if(isset($empresa))
                                            @if($cat->id != $empresa->categoria->id)
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

                            <div class="col-md-6 col-form-label text-md-left">
                                <label class="col-form-label">Logomarca <small>Preferencialmente a imagem deve ser quadrada</small></label>
                                <div>
                                    <input id="arquivo" type="file" name="imagem" class="filestyle" @error('arquivo') is-invalid @enderror  name="arquivo" >

                                </div>
                                
                                @error('arquivo')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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

                        <article class="row ">
                            <div class="form-group col-md-12 col-form-label text-md-left">
                                <label for="" class="col-form-label">Fotos Adicionais. <small>Envie até 4 fotos de produtos, do serviço prestado ou do estabelecimento.</small></label>
                            </div>
                            <div class="input-group col-12">
                                    <input multiple="multiple" id="fotos" type="file" name="fotos[]" class="form-control @error('fotos') is-invalid @enderror">
                                    
                                    @error('fotos')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>
                        </article>

                        <hr>

                        <article class="row">
                            <div class="form-group col-12 col-md-4 col-form-label text-md-left">
                                <label for="telefone" class="col-form-label">Telefone/Celular *</label>
                                <input id="telefone" type="text" onkeyup="phoneMask(event)" class="form-control @error('telefone') is-invalid @enderror"  name="telefone" id="telefone" required autocomplete="telefone" autofocus>
                                <label for="ehWhats">
                                    <input type="checkbox" class="mt-2" name="ehWhats" id="ehWhats" value="1">
                                    <small>Marque aqui se o número for WhatsApp</small>
                                </label>
                                
                                @error('telefone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-12 col-md-4 col-form-label text-md-left">
                                <label for="email" class="col-form-label">Email</label>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  name="email" value="{{$empresa->email ?? ''}}">

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group col-12 col-md-4 col-form-label text-md-left">
                                <label for="facebook" class="col-form-label">Facebook <small>(O link deve ser informado completamente)</small></label>
                                <input id="facebook" type="text" class="form-control @error('facebook') is-invalid @enderror" name="facebook" placeholder="Ex:. https://www.facebook.com/sua-page">

                                @error('facebook')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </article>

                        <article class="row">
                            <div class="form-group col-12 col-md-4 col-form-label text-md-left">
                                <label for="youtube" class="col-form-label">Youtube <small>(O link deve ser informado completamente)</small></label>
                                <input id="youtube" type="text" class="form-control @error('youtube') is-invalid @enderror" placeholder="Ex:. https://www.youtube.com/seu-canal"  name="youtube">

                                @error('youtube')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror 
                            </div>
                
                            <div class="form-group col-12 col-md-4 col-form-label text-md-left">
                                <label for="instagram" class="col-form-label">Instagram <small>(O link deve ser informado completamente)</small> </label>
                                <input id="instagram" type="text" class="form-control @error('instagram') is-invalid @enderror" name="instagram" placeholder="Ex:. https://www.instagram.com/seu-insta">

                                @error('instagram')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group col-12 col-md-4 col-form-label text-md-left">
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
                                        <input class="form-check-input" type="checkbox" name="aceitaPix" id="inlineCheckbox1" value="1" @if(isset($empresa) && $empresa->aceitaPix) checked @endif>
                                        <label class="form-check-label" for="inlineCheckbox1">Pix</label>
                                    </div>
                                </div>
                            </div>   
                        </article>

                        <hr>
                        <h3>Endereço</h3>

                        <article class="row">
                            <div class="form-group col-12 col-md-7 col-form-label text-md-left">
                                <label for="logradouro" class="col-form-label">Logradouro *</label>
                                <input id="logradouro" type="text" class="form-control @error('logradouro') is-invalid @enderror" name="logradouro"  required autocomplete="logradouro" autofocus>

                            

                                @error('rua')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="form-group col-8 col-md-3 col-form-label text-md-left">
                                <label for="Bairro" class="col-form-label">Bairro</label>
                                <input id="bairro" type="text" class="form-control @error('bairro') is-invalid @enderror" name="bairro" value="{{$empresa->endereco->bairro ?? 'Aviário'}}" required autocomplete="bairro" autofocus>
                
                                @error('bairro')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                
                            <div class="form-group col-4 col-md-2 col-form-label text-md-left">
                                <label for="Numero" class="col-form-label">Número</label>
                                <input id="numero" type="number" class="form-control @error('rua') is-invalid @enderror"  name="numero" value="{{$empresa->endereco->numero ?? ''}}">

                                @error('numero')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </article>

                        <article class="row">
                            <div class="form-group col-12 col-form-label text-md-left">
                                <label for="complemento" class="col-form-label">Complemento</label>
                                <input id="complemento" type="text" class="form-control @error('complemento') is-invalid @enderror" value="{{$empresa->endereco->complemento ?? ''}}" name="complemento" >

                                <div class="form-check mt-2">
                                    <label for="ehComercial">
                                        <input class="form-check-input" type="checkbox" name="ehComercial" id="ehComercial" value="1" @if(isset($empresa) && $empresa->endereco->ehComercial) checked @endif>
                                        <label class="form-check-label" for="ehComercial">Marque aqui se esse for um endereço comercial</label>
                                    </label>
                                </div>

                                @error('rua')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </article>
                        
                        <div class="row justify-content-end">
                            <div class="col-12 col-md-3">
                                <button type="submit" class="btn btn-enviar">Enviar</button>

                            </div>
                        </div>
                    </form>
                </article>
            </section>
        </section>
            
    </section>
</body>
</html>
