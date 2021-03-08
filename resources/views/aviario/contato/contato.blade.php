@extends('layouts.app')

@section('content')
    <section class="padding-padrao pt container contato">
        <article class="card">
            <article class="card-body">
                <h2>Contato</h2>

                <div class="mt-3">
                    <h3>Dúvidas, sugestões, reclamações? Fale conosco!</h3>
                    <p>Preencha os dados corretamente e responderemos o mais rápido possível</p>
                </div>

                <form action = "{{ route('aviario.mensagem') }}" method = "POST" enctype="multipart/form-data">
                    @csrf
                    <article class="row">
                        @if($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible fade show mt-2" role="alert">
                                <strong>Email enviado</strong> Sua mensagem será respondida em breve.
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        @endif
                        
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
                            <label for="email" class="col-form-label">Email*</label>
                            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" required autocomplete="email" autofocus>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>

                        <div class="form-group col-12 col-md-6 col-form-label text-md-left">
                            <label for="assunto" class="col-form-label">Assunto*</label>
                            <input id="assunto" type="text" class="form-control @error('assunto') is-invalid @enderror"  name="assunto" id="assunto" required autofocus>
                            
                            @error('assunto')
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


                    <div>
                        <input type="text" hidden="true" name="destinatario" value="contato@aviario.online">
                    </div>

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