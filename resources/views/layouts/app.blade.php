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

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@300;400;500;600;700&display=swap" rel="stylesheet">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/painel.css') }}" rel="stylesheet">
    <link href="{{ asset('css/aviario.css') }}" rel="stylesheet">

</head>
<body>
    <div id="app">
        <nav class="navbar nav-acesso navbar-expand shadow-sm">
            <div class="container">
                
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <div class="mr-auto">
                    <h6>{{now()->toDateTimeString()}} </h6>
                    </div>
                    
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
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
                </div>
            </div>
        </nav>
        @auth
            <section class="pt-4 container-fluid home-page">
                <article class="nav-row row justify-content-between">
                    <div class="col-3">
                        <img src="{{ url('img/aviario-online-logo.png') }}" alt="">
                    </div>
                    <div class="items col-9 ">
                        <nav class="navbar nav-admin navbar-expand-lg navbar-light bg-light  ">
                            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                                <span class="navbar-toggler-icon"></span>
                            </button>
                            <div class="collapse navbar-collapse justify-content-end " id="navbarNavAltMarkup">
                            <ul class="navbar-nav justify-content-end ">
                                @if(Auth::user()->ehGerente)
                                    <li class="nav-item ">
                                        <a class="nav-link" href="{{route('users.index')}}" >Usuários <span class="sr-only">(current)</span></a>
                                    </li>
                                @endif
                                <li class="nav-item dropdown">
                                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
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
                                    <a class="nav-link" href="{{route('users.index')}}">Banners</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="{{route('users.index')}}">Enquetes</a>
                                </li>
                            </ul>
                            </div>
                        </nav>
                    </div>
                </article>
            </section>
        @endauth
        <hr class="col-10 m-auto hr-menu">
        
        <main class="content p-4">
            @yield('content')
        </main>
    </div>
    <script src="{{url("js/script.js")}}"></script>
</body>
</html>
