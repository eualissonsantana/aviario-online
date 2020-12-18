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
    <script type="text/javascript" src="{{url("js/tinymce.js")}}"></script>
    <script type="text/javascript" src="https://widgets-viewer.climacell.co/v1/sdk.js"></script>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

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
            <nav class="navbar nav-acesso navbar-expand shadow-sm">
                <div class="container">  
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        
                        <!-- Right Side Of Navbar -->
                        <ul class="navbar-nav ml-auto">
                            <!-- Authentication Links -->
                           
                        </ul>
                    </div>
                </div>
            </nav>
            <section class="content-child d-none d-sm-block">
                <div class="row px-3 pt-2 justify-content-between">
                    <div class="col-2">
                        <a class="" href="#">
                            <img class="" src="{{ url('img/aviario-online-logo.png') }}" alt="Logo Aviário Online">
                        </a>
                    </div>
    
                    <div class="col-7 d-none d-sm-block">
                        <a class="" href="#">
                            <img class="" src="{{ url('img/3292.png') }}" alt="Logo Aviário Online">
                        </a>
                    </div>
    
                    <div class="clima-tempo col-2">
                        {{now()}}
                    </div>
                </div>
            </section>

            <nav class="container-fluid navbar nav-admin navbar-expand-lg navbar-light mt-md-2 pr-md-5 home-page">                    
                <button class="navbar-toggler navbar-dark" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                @if(Auth::user())
                <div class="collapse navbar-collapse justify-content-center" id="navbarNavAltMarkup">
                @else 
                <div class="collapse navbar-collapse justify-content-end mr-md-5 pr-md-5" id="navbarNavAltMarkup">
                @endif
                    @auth    
                        <ul class="navbar-nav">
                            @if(Auth::user()->ehGerente)
                                <li class="nav-item ">
                                    <a class="nav-link" href="{{route('users.index')}}" >Usuários <span class="sr-only">(current)</span></a>
                                </li>
                            @endif
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Notícias
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('posts.index')}}">Posts</a>
                                    <a class="dropdown-item" href="{{route('post_categorias.index')}}">Categorias</a>
                                </div>
                            </li>
                            <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                    Guia Comercial
                                </a>
                                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{route('empresas.index')}}">Comércios</a>
                                    <a class="dropdown-item" href="{{route('empresa_categorias.index')}}">Categorias</a>
                                </div>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('banners.index')}}">Banners</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="{{route('users.index')}}">Enquetes</a>
                            </li>
                            @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Acesso restrito') }}</a>
                                </li>
                            @endif
                            @else
                                <li class="nav-item dropdown">
                                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                        {{ Auth::user()->name }}
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
                    @endauth

                    @if(!Auth::user())
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
                        @guest
                        @if (Route::has('login'))
                            <li class="nav-item">
                                <a class="nav-link" href="{{ route('login') }}">{{ __('Acesso restrito') }}</a>
                            </li>
                        @endif
                        @else
                            <li class="nav-item dropdown">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
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

                    <form class="form-inline pl-md-5 ml-md-5 my-2 my-lg-0" action="{{route('empresas.search')}}" method="POST">
                        @csrf
                        <input type="text" hidden="true" name="option" value="nome">
                        <input class="form-control mr-sm-2" type="search" placeholder="Procurar" aria-label="Search">
                        <button hidden="true" class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>
                    </form>
                   
                    @endif
                    
                </div>
                
            </nav>
        
        
        <main class="content p-4 mb-3">
            @yield('content')
        </main>
    </div>
    <script src="{{url("js/script.js")}}"></script>
</body>
</html>
