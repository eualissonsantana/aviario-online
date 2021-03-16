<?php
    use Carbon\Carbon;
    $carbon = new Carbon;
?>

<!doctype html>
<html lang="pt-BR">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="theme-color"  content="#2d9cdb">
    <meta name="apple-mobile-web-app-status-bar-style" content="#2d9cdb">
    <meta name="author" content="Alisson Santana">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
    <meta property="fb:app_id" content="257193392700081" />
    <meta property="og:image" content=@yield('og-image')/>
    <meta property="og:image:type" content="image/png" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:height" content="400" />

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script type="text/javascript" src='https://cdn.tiny.cloud/1/5f1scw7zl01d1jwmygfksnkg8tlk7dft9qvie9wkeopsbhdt/tinymce/5/tinymce.min.js' referrerpolicy="origin"></script>
    <script src="https://kit.fontawesome.com/263db3eba8.js" crossorigin="anonymous"></script>
    <script type="text/javascript" src="{{url("js/tinymce.js")}}"></script>
    <script type="text/javascript" src="https://widgets-viewer.climacell.co/v1/sdk.js"></script>
    <script src="{{ url('js/mask.js') }}" ></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;600;700;800&family=Open+Sans:wght@400;600family=Oxygen:wght@300&display=swap" rel="stylesheet">
    
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/painel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/painel-mobile.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aviario.css') }}" rel="stylesheet">

    
    <link rel="icon" type="image/png" href="img/icons/favicon.png">

    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v10.0&appId=257193392700081&autoLogAppEvents=1" nonce="uvq0AYBf"></script>  
</head>

<body onload="carregaClasses()">
    <div id="app">
           
        <section class="padding-padrao d-none d-sm-block">
            <div class="row pt-2 justify-content-between">
                <div class="col-2 logo">
                    <a href="{{route('aviario.index')}}">
                        <img src="{{ url('img/logo.png') }}" alt="Logo Aviário Online" >
                    </a>
                </div>

                <div class="col-7 d-none d-sm-block banners-topo">           
                    <div id="carouselExampleControls" class="carousel slide carousel-app" data-ride="carousel" >
                        <div class="carousel-inner">
                            @if(isset($bannersRetangulares))
                                @foreach ($bannersRetangulares as $banner)
                                    <div class="carousel-item carousel-app-item">
                                        <img class="d-block w-100" src="{{ url('public/storage/imagens/banners/'.$banner->imagem) }}" alt="{{$banner->titulo}}">
                                    </div>
                                @endforeach
                            @endif
                        </div>
                    </div>
                </div>

                <div class="col-3 cadastre-seu-negocio">
                    <a href="http://aviario.online/cadastrar">
                        <img src="{{ url('img/cadastre-seu-negocio.jpg') }}" alt="Logo Aviário Online">
                    </a>
                </div>

              

            </div>
        </section>

        <nav class="container-fluid navbar bg-destaque navbar-expand-lg  mt-md-2 pr-md-5 home-page">                    
            <a class="navbar-brand d-block d-sm-none pl-3 logo" href="{{route('aviario.index')}}">
                <img src="{{ url('img/logo-branco.png') }}" alt="Logo Aviário Online" width="100px">
            </a>
            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
           
            <div class="collapse navbar-collapse justify-content-between " id="navbarNavAltMarkup">
                <ul class="navbar-nav justify-content-between ">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('aviario.index')}}">Início<span class="sr-only">(current)</span></a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('posts.lista')}}">Notícias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('guia.index')}}">Guia Comercial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('aviario.enquetes')}}">Enquetes</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('aviario.contato')}}">Contato</a>
                    </li>
                    

                    @if (auth()->user())
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                Painel
                            </a>

                            <div class="dropdown-menu dropdown-menu-left" aria-labelledby="navbarDropdown">
                                @if(auth()->user()->ehGerente)
                                    <a class="dropdown-item" href=" {{route('users.index')}} ">Usuários</a>
                                    <div class="dropdown-divider"></div>
                                @endif

                                <a class="dropdown-item" href=" {{route('posts.index')}} ">Notícias</a>
                                <a class="dropdown-item" href=" {{route('post_categorias.index')}} ">Categorias de Notícias</a>
                                <div class="dropdown-divider"></div>

                                <a class="dropdown-item" href=" {{route('empresas.index')}} ">Guia Comercial</a>
                                <a class="dropdown-item" href=" {{route('empresa_categorias.index')}} ">Categorias do Guia Comercial</a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('enquetes.index')}}">Enquetes</a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{route('banners.index')}}">Banners</a>
                                
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('logout') }}"
                                onclick="event.preventDefault();
                                                document.getElementById('logout-form').submit();">
                                    {{ __('Sair') }}
                                </a>
                                
                                <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                    @csrf
                                </form>
                            </div>
                        </li>   
                    @endif
                </ul>

                <form class="search-nav pl-md-5 ml-md-5 my-2 my-lg-0" action="{{route('aviario.posts.search')}}" method="POST">
                    @csrf
                    <div class="area-procura-noticia">
                        <input type="text" hidden="true" name="option" value="titulo">
                        <input class="procura-noticia" type="text" name="filter" placeholder="Procurar notícia" aria-label="Search">
                        <button><i type="submit" class="fas fa-search"></i></button>
                    </div>
                </form>
            </div>
        </nav>
        
        <main class="content">
            @yield('content')
        </main>

        <footer class="padding-padrao">
            <div class="row ">
                <div class="col-12 col-md-2 logo">
                    <img src="{{ url('img/logo-branco.png') }}" width="180px" alt="Logo Aviário Online">
                </div>

                <div class="col-12 col-md-8 row pb-1 align-self-end navegacao">
                    <div class="col-12 col-md-2">
                        <a href="{{route('aviario.index')}}">Início</a>
                        <a href="{{route('posts.lista')}}">Notícias</a>
                        <a href="{{route('guia.index')}}">Guia Comercial</a>
                    </div>
                    <div class="col-12 col-md-2">
                        <a href="{{route('aviario.enquetes')}}">Enquetes</a>
                        <a href="{{route('aviario.contato')}}">Contato</a>
                    </div>

                </div>

                <div class="text-left dev-info col-12 col-md-2 pb-1 align-self-end">
                    <p><strong>Projeto e idealização:</strong></p>
                    <p>IFBA - Feira da Santana</p>
                    <p>Associações locais</p>
                </div>

            </div>

            
            
        </footer>
    </div>
    <script src="{{url("js/script.js")}}"></script>
    <script src="{{ url('js/delete.js') }}" ></script>
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.form/4.3.0/jquery.form.min.js" integrity="sha384-qlmct0AOBiA2VPZkMY3+2WqkHtIQ9lSdAsAn5RUJD/3vA5MKDgSGcdmIv4ycVxyn" crossorigin="anonymous"></script>
    <script>
        $(function(){
            $('form[name="formVoto"]').submit(function(event){
                event.preventDefault();

                $.ajax({
                    url: "{{route('aviario.enquetes.respostas')}}",
                    type: "post",
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        if(response.validacao === true){
                            $('.mensagemBox').removeClass('d-none').html('Voto registrado com sucesso!')
                            
                            $('.divFormVoto').addClass('d-none')
                            $('.resultadoParcial').removeClass('d-none')
                            console.log(response)
                            var opcao1 = ((response.opcoes[0].qtd_votos / response.totalVotos) * 100).toFixed(2)
                            $('.parcial-1').html(response.opcoes[0].descricao + ' - ' + opcao1 + '%')

                            var opcao2 = ((response.opcoes[1].qtd_votos / response.totalVotos) * 100).toFixed(2)
                            $('.parcial-2').html(response.opcoes[1].descricao + ' - ' + opcao2 + '%')

                            var opcao3 = ((response.opcoes[2].qtd_votos / response.totalVotos) * 100).toFixed(2)
                            $('.parcial-3').html(response.opcoes[2].descricao + ' - ' + opcao3 + '%')

                            var opcao4 = ((response.opcoes[3].qtd_votos / response.totalVotos) * 100).toFixed(2)
                            $('.parcial-4').html(response.opcoes[3].descricao + ' - ' + opcao4 + '%')
                            
                        } else {
                            alert('Erro')
                        }
                    }
                });
            });
        })

        $(function(){
            $('form[name="formEncerraEnquete"]').submit(function(event){
                event.preventDefault();

                $.ajax({
                    url: "{{route('enquete.encerra')}}",
                    type: "post",
                    data: $(this).serialize(),
                    dataType: 'json',
                    success: function(response) {
                        console.log(response)
                    }
                });
            });
        })
    </script>
</body>
</html>
