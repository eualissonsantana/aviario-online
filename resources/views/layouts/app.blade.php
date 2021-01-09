<?php
use Carbon\Carbon;
?>

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Aviário Online</title>

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

</head>
<body>
    <div id="fb-root"></div>
    <script async defer crossorigin="anonymous" src="https://connect.facebook.net/pt_BR/sdk.js#xfbml=1&version=v9.0" nonce="uJ0WJ2He"></script>
    
    <div id="app">
           
        <section class="padding-padrao d-none d-sm-block">
            <div class="row pt-2 justify-content-between">
                <div class="col">
                    <a class="" href="{{route('aviario.index')}}">
                        <img class="" src="{{ url('img/logo.png') }}" alt="Logo Aviário Online">
                    </a>
                </div>

                <div class="col-7 d-none d-sm-block banners-topo">
                    <a class="anuncio-topo" href="#">
                        <img class="" src="{{ url('img/3312.gif') }}" alt="Logo Aviário Online">
                    </a>
                </div>

                <div class="clima-tempo col">
                    {{now()}}
                </div>
            </div>
        </section>

        <nav class="container-fluid navbar bg-destaque navbar-expand-lg  mt-md-2 pr-md-5 home-page">                    
            <a class="navbar-brand d-block d-sm-none pl-3 logo" href="#">Aviário Online</a>
            <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
           
            <div class="collapse navbar-collapse justify-content-between " id="navbarNavAltMarkup">
                <ul class="navbar-nav  justify-content-between ">
                    <li class="nav-item ">
                        <a class="nav-link" href="{{route('aviario.index')}}" >Início<span class="sr-only">(current)</span></a>
                    </li>
                    
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('posts.lista')}}">Notícias</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('guia.index')}}">Guia Comercial</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{route('guia.index')}}">Contato</a>
                    </li>
                    

                    @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Acesso Restrito') }}</a>
                            </li>
                        @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    Painel
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
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
                    @endguest
                </ul>

                <form class="search-nav pl-md-5 ml-md-5 my-2 my-lg-0" action="{{route('empresas.search')}}" method="POST">
                    @csrf
                    <div class="area-procura-noticia">
                        <input type="text" hidden="true" name="option" value="nome">
                        <input class="procura-noticia" type="text" placeholder="Procurar notícia" aria-label="Search">
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

                <div class="col-12 col-md-3 row pb-1 align-self-end navegacao">
                    <div class="col-6">
                        <p>Início</p>
                        <p>Notícias</p>
                        <p>Guia Comercial</p>
                    </div>

                    <div class="col-6">
                        <p>Contato</p>
                        <p>Contato</p>
                        <p>Contato</p>
                    </div>

                </div>

                <div class="text-right dev-info col-12 col-md-7 pb-1 align-self-end">
                    <p>© Copyright 2021 - Aviário Online</p>
                    <p>Desenvolvido por <strong>Alisson Santana</strong> </p>
                </div>

            </div>

            
            
        </footer>
    </div>
    <script src="{{url("js/script.js")}}"></script>
</body>
</html>
