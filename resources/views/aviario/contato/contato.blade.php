@extends('layouts.app')

@section('content')
    <section class="padding-padrao container contato">
        <article class="card">
            <article class="card-body">
                <h2>Contato</h2>

                <div class="mt-3">
                    <h3>Dúvidas, sugestões, reclamações? Fale conosco!</h3>
                    <p>Preencha os dados corretamente e responderemos o mais rápido possível</p>
                </div>

                <form action = "{{ route('empresas.cadastrar-comercio') }}" method = "POST" enctype="multipart/form-data">
                    @csrf
                    <article class="row">
                        <div class="form-group col-12 col-form-label text-md-left">
                            <label for="name" class="col-form-label">Nome completo* </label>            
                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="nome"  required autocomplete="name" autofocus>
            
                            @error('name')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </article>

                    <article class="row">
                        <div class="form-group col-12 col-md-6 col-form-label text-md-left">
                            <label for="telefone" class="col-form-label">Telefone/Celular</label>
                            <input id="telefone" type="text" onkeyup="phoneMask(event)" class="form-control @error('telefone') is-invalid @enderror"  name="telefone" id="telefone" >
                            
                            @error('telefone')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-6 col-form-label text-md-left">
                            <label for="email" class="col-form-label">Email*</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"  required autocomplete="telefone" autofocus>

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
                        <div class="col-12 col-md-3">
                            <button type="submit" class="btn btn-enviar">Enviar</button>
                        </div>
                    </div>
                </form>
            </article>
        </article>
    </section>
@endsection