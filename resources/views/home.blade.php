@extends('layouts.app')

@section('content')
    <section class="gerenciamento padding-padrao">
        <article class="titulo">
            <h1>Painel de gerenciamento</h1>
        </article>

        <hr>
    
        <section class="conteudo">
            @if(Auth::user()->ehGerente)
                <section class="row">
                    <article class="col-12 col-md-6">
                        <section class="row">
                            <div class="col-md-5 col-sm-12">
                                <a href="#">
                                    <article>
                                        <h2>Administradores</h2>
                                        <article class="av-card mt-3">
                                            <div class="av-card-title">
                                                <h3>Usuários</h3>
                                            </div>
                                            <div class="av-card-body row ">
                                                <div>
                                                    <h4>5</h4>
                                                </div>
                                                <div class="mt-3">
                                                    <p>usuários</p>
                                                    <p>cadastrados</p>
                                                </div>
                                            </div>
                                        </article>
                                    </article>
                                </a>
                            </div>
                        </section>
                    </article>

                </section>
                <hr>
            @endif
            
            <section class="row">
                <article class="col">
                    <h2>Posts</h2>
                    <section class="row justify-content-start">
                        <div class="col-md-5 col-sm-12 ">
                            <a href="#">
                                <article class="av-card mt-3">
                                    <div class="av-card-title">
                                        <h3>Notícias</h3>
                                    </div>
                                    <div class="av-card-body row ">
                                        <div>
                                            <h4>5</h4>
                                        </div>
                                        <div class="mt-3">
                                            <p>notícias</p>
                                            <p>cadastradas</p>
                                        </div>
                                    </div>
                                </article>
                            </a>
                        </div>

                        <div class="col-md-5 col-sm-12 space-card">
                            <a href="#">
                                <article class="av-card mt-3">
                                    <div class="av-card-title">
                                        <h3>Categorias</h3>
                                    </div>
                                    <div class="av-card-body row ">
                                        <div>
                                            <h4>5</h4>
                                        </div>
                                        <div class="mt-3">
                                            <p>categorias</p>
                                            <p>cadastradas</p>
                                        </div>
                                    </div>
                                </article>
                            </a>
                        </div>

                    </section>
                </article>

                <article class="col">
                    <h2>Guia Comercial</h2>
                    <section class="row justify-content-start">
                        <div class="col-md-5 col-sm-12">
                            <a href="#">
                                <article class="av-card mt-3">
                                    <div class="av-card-title">
                                        <h3>Comércios</h3>
                                    </div>
                                    <div class="av-card-body row ">
                                        <div>
                                            <h4>5</h4>
                                        </div>
                                        <div class="mt-3">
                                            <p>comércios</p>
                                            <p>cadastrados</p>
                                        </div>
                                    </div>
                                </article>
                            </a>
                        </div>
                
                        <div class="col-md-5 col-sm-12 space-card">
                            <a href="#">
                                <article class="av-card mt-3">
                                    <div class="av-card-title">
                                        <h3>Categorias</h3>
                                    </div>
                                    <div class="av-card-body row ">
                                        <div>
                                            <h4>5</h4>
                                        </div>
                                        <div class="mt-3">
                                            <p>categorias</p>
                                            <p>cadastradas</p>
                                        </div>
                                    </div>
                                </article>
                            </a>
                        </div>
                    </section>
                </article>
            </section>

            <hr>

            <section class="row">
                <article class="col">
                    <h2>Publicidade</h2>
                    <section class="row justify-content-start">
                            <div class="col-md-5 col-sm-12 ">
                                <a href="#">
                                    <article class="av-card mt-3">
                                        <div class="av-card-title">
                                            <h3>Banners</h3>
                                        </div>
                                        <div class="av-card-body row ">
                                            <div>
                                                <h4>5</h4>
                                            </div>
                                            <div class="mt-3">
                                                <p>banners</p>
                                                <p>cadastrados</p>
                                            </div>
                                        </div>
                                    </article>
                                </a>
                            </div>
                        </section>
                </article>

                <article class="col-12 col-md-6">
                    <h2>Questionários</h2>
                    <section class="row justify-content-start">
                        <div class="col-md-5 col-sm-12">
                            <a href="#">
                                <article class="av-card mt-3">
                                    <div class="av-card-title">
                                        <h3>Enquetes</h3>
                                    </div>
                                    <div class="av-card-body row ">
                                        <div>
                                            <h4>5</h4>
                                        </div>
                                        <div class="mt-3">
                                            <p>comércios</p>
                                            <p>cadastrados</p>
                                        </div>
                                    </div>
                                </article>
                            </a>
                        </div>
                    </section>
                </article>

            </section>
        </section>

    </section>
@endsection

