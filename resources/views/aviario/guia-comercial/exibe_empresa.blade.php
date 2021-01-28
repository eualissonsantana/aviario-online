@extends('layouts.app')

@section('content')
    <section class="padding-padrao pt exibe-comercio">
        <section class="row justify-content-between">
            <div class="col-12 col-md-8">
                <section class="row">  
                    <article class="imagem-comercio col-5 col-md-4 mr-0">
                        <img src="{{ url('public/storage/imagens/empresas/logomarcas/'.$empresa->imagem)}}"/>
                    </article>
                    <div class="col-7 col-md-8 d-flex align-content-around flex-wrap">
                        <div class="titulo">
                            <h2> {{$empresa->nome}} </h2>
                            <p> {{$empresa->slogan}} </p>
                        </div>
    
                        <div class="endereco col-12 px-0 d-none d-sm-block">
                            <p>
                                @if($empresa->endereco->logradouro)
                                    {{$empresa->endereco->logradouro}} ,
                                @endif
                                @if ($empresa->endereco->numero)
                                    {{$empresa->endereco->numero}}
                                @endif
                            </p>
    
                            <p>
                                {{$empresa->endereco->bairro}} -
    
                                @if ($empresa->endereco->cep)
                                    {{$empresa->endereco->rua}} -
                                @endif
    
                                Feira de Santana/BA
                            </p>

                            @if($empresa->endereco->ehComercial)
                                <p ><small class="verde"> Esse é um endereço comercial</small></p> 
                                
                            @endif
    
                        </div>

                        <div class="contatos col-12 px-0">
                            <h4> {{$empresa->telefone}} </h4>
                            @if ($empresa->ehWhats == 1)
                                <div class="mt-1">
                                    <p ><small>Esse número também é <span class="verde"> Whats App! </span> </small></p>
                                    <p class="mt-1" ><small> Ao entrar em contato, informe que viu no <strong class="destaque">Aviário Online</strong> </small></p>
                                </div>
                            @endif
                        </div>
                    </div>
                </section>

                <section class="mt-3">
                    <div class="endereco col-12 px-0 d-block d-sm-none">
                        <p>
                            @if($empresa->endereco->logradouro)
                                {{$empresa->endereco->logradouro}} ,
                            @endif
                            @if ($empresa->endereco->numero)
                                {{$empresa->endereco->numero}}
                            @endif
                        </p>
    
                        <p>
                            {{$empresa->endereco->bairro}} -
    
                            @if ($empresa->endereco->cep)
                                {{$empresa->endereco->rua}} -
                            @endif
    
                            Feira de Santana/BA
                        </p>
    
                        @if($empresa->endereco->ehComercial)
                            <p class="mt-2"><small class="verde"> Esse é um endereço comercial</small></p> 
                            
                        @endif
    
                    </div>
                </section>
                
                <hr>
        
                <section class="row">
                    <div class="col-12 col-md-6">
                        @if($empresa->aceitaBoleto || $empresa->aceitaCredito || $empresa->aceitaDebito || $empresa->aceitaPix)
                            <h4>Formas de pagamento</h4>
                            <div class="mt-3 formas-pagamento">
                                <div class="row text-center">
                                    @if($empresa->aceitaBoleto)
                                        <div class="col-2">
                                            <img src="{{url('img/icons/boleto.png')}}" alt="Ícone Boleto">
                                            <p class="mt-2">boleto</p>  
                                        </div>
                                    @endif
                                    @if ($empresa->aceitaCredito)
                                    <div class="col-2">
                                        <img src="{{url('img/icons/credito.png')}}" alt="ìcone Cartão de Crédito">
                                        <p class="mt-2">crédito</p> 
                                    </div>
                                    @endif
                                    @if ($empresa->aceitaDebito)
                                    <div class="col-2">
                                        <img src="{{url('img/icons/debito.png')}}" alt="Ícone Cartão de Débito">
                                        <p class="mt-2">débito</p> 
                                    </div>
                                    @endif
                                    @if ($empresa->aceitaPix)
                                    <div class="col-2">
                                        <img src="{{url('img/icons/pix.png')}}" alt="Ícone Pix">
                                        <p class="mt-2">pix</p> 
                                    </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>

                    <hr class="col-10 d-block d-sm-none">

                    <div class="col-12 col-md-6">
                        @if($empresa->youtube || $empresa->facebook || $empresa->instagram)
                            <h4>Redes Sociais</h4>
                            <div class="mt-3 redes-sociais">
                                <div class="row r">
                                    @if($empresa->facebook)
                                        <div class="col-4">
                                            <img src="{{url('img/icons/facebook.png')}}" alt="Ícone Facebook">
                                            <p class="mt-2">{{$empresa->facebook}}</p>  
                                        </div>
                                    @endif
                                    @if($empresa->instagram)
                                        <div class="col-4">
                                            <img src="{{url('img/icons/instagram.png')}}" alt="Ícone Instagram">
                                            <p class="mt-2">{{$empresa->instagram}}</p>  
                                        </div>
                                    @endif
                                    @if($empresa->youtube)
                                        <div class="col-4">
                                            <img src="{{url('img/icons/youtube.png')}}" alt="Ícone Youtube">
                                            <p class="mt-2">{{$empresa->youtube}}</p>  
                                        </div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </section>
        
                <section class="mt-5 sobre">
                    @if($empresa->descricao)
                        <h4>Sobre a Empresa</h4>
                        <div class="mt-3">
                            <p>  
                                {{$empresa->descricao}}
                            </p>
                        </div>
                    @endif
                </section>

                @if($fotos != null)
                    <section class="mt-5 fotos">
                        <h4>Fotos</h4>
                        <div class="mt-3">
                            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
                                <ol class="carousel-indicators">
                                    @php
                                        $i = 0;
                                    @endphp
                                    @foreach ($fotos as $foto)
                                        <li data-target="#carouselExampleIndicators" data-slide-to="{{$i}}" class="active"></li>
                                        @php
                                            $i++;
                                        @endphp
                                    @endforeach
                                </ol>
                                <div class="carousel-inner">
                                    @foreach ($fotos as $foto)
                                        <div class="carousel-item comercio-carousel">
                                            <img class="d-block w-100" src="{{ url('storage/imagens/empresas/adicionais/'.$foto->nome)}}" alt="First slide">
                                        </div>    
                                    @endforeach
                                </div>
                                <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
                                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Previous</span>
                                </a>
                                <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
                                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                    <span class="sr-only">Next</span>
                                </a>
                            </div>
                        </div>
                    </section>
                @endif
            </div>

            <hr class="col-10 d-block d-sm-none"> 

            <div class="col-12 col-md-4 ">
                <article class="card">
                    <article class="card-body">
                        <h2>Contato</h2>
        
                        <div class="">
                            <p>Envie um email para essa empresa</p>
                        </div>
        
                        <form action = "{{ route('empresas.cadastrar-comercio') }}" method = "POST" enctype="multipart/form-data">
                            @csrf
                            <article class="row">
                                <div class="form-group col-12 col-form-label text-md-left">
                                    <label for="name" class="col-form-label">Nome </label>            
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="nome"  required autocomplete="name" >
                    
                                    @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </article>
        
                            <article class="row">
                                <div class="form-group col-12 col-form-label text-md-left">
                                    <label for="telefone" class="col-form-label">Telefone/Celular</label>
                                    <input id="telefone" type="text" onkeyup="phoneMask(event)" class="form-control @error('telefone') is-invalid @enderror"  name="telefone" id="telefone" >
                                    
                                    @error('telefone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </article>

                            <article class="row">
                                <div class="form-group col-12 col-form-label text-md-left">
                                    <label for="email" class="col-form-label">Email*</label>
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  required autocomplete="telefone">
        
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </article>
        
                            <article class="row">
                                <div class="form-group col-12  col-form-label text-md-left">
                                    <label class="col-form-label">Mensagem*</label>
                                    <textarea class="form-control" name="mensagem" rows="5"></textarea>
                                </div>
                            </article>
        
                            <div class="row justify-content-end">
                                <div class="col-12">
                                    <button type="submit" class="btn btn-enviar">Enviar</button>
                                </div>
                            </div>
                        </form>
                    </article>
                </article>
            </div>
        </section>
        
    </section>
@endsection