@extends('layouts.app', ['bannersCarousel' => $bannersRetangulares])

@section('content')
    <div class="padding-padrao pt painel-nova-noticia">
        <section class="card">
            <article class="card-body">
                <h2>
                    @if(isset($enquete))
                        Editar Enquete
                    @else 
                        Nova Enquete
                    @endif
                </h2>

                @if(isset($enquete))
                    <form action = "{{ url("painel/enquetes/$enquete->id")}}" method = "POST" enctype="multipart/form-data">
                        @method('PUT')
                @else
                    <form action = "{{ route('enquetes.store') }}" method = "POST" enctype="multipart/form-data">
                @endif

                    @csrf
                    <div class="form-group col-form-label text-md-left">
                        <label for="pergunta" class="col-form-label">Descrição da pergunta</label>
                        <input id="pergunta" type="text" class="form-control @error('pergunta') is-invalid @enderror" name="pergunta" value="{{$enquete->pergunta ?? ''}}" required autocomplete="pergunta" autofocus>

                        @error('pergunta')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <h2>Preencha ao menos duas opções para resposta</h2>

                    <article class="row">
                        <div class="form-group col-form-label text-md-left col-12 col-md-6">
                            <label for="opcao1" class="col-form-label">Opção de resposta 1 *</label>
                            <input id="opcao1" type="text" class="form-control @error('opcao1') is-invalid @enderror"  name="opcao[]" @if($opcoes ?? '') readonly @endif value="{{$opcoes ?? ''[0]->descricao ?? ''}}" required autocomplete="opcao1" autofocus>

                            @error('opcao1')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>

                        <div class="form-group col-form-label text-md-left col-12 col-md-6">
                            <label for="opcao2" class="col-form-label">Opção de resposta 2 *</label>
                            <input id="opcao2" type="text" class="form-control @error('opcao2') is-invalid @enderror"  name="opcao[]" @if($opcoes ?? '') readonly @endif value="{{$opcoes ?? ''[1]->descricao ?? ''}}" required autocomplete="opcao2" autofocus>

                            @error('opcao2')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>
                    </article>

                    <article class="row">
                        <div class="form-group col-form-label text-md-left col-12 col-md-6">
                            <label for="opcao3" class="col-form-label">Opção de resposta 3</label>
                            <input id="opcao3" type="text" class="form-control @error('opcao3') is-invalid @enderror"  name="opcao[]" @if($opcoes ?? '') readonly @endif value="{{$opcoes ?? ''[2]->descricao ?? ''}}">

                            @error('opcao3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>

                        <div class="form-group col-form-label text-md-left col-12 col-md-6">
                            <label for="opcao4" class="col-form-label">Opção de resposta 4</label>
                            <input id="opcao4" type="text" class="form-control @error('opcao4') is-invalid @enderror"  name="opcao[]" @if($opcoes ?? '') readonly @endif value="{{$opcoes ?? ''[3]->descricao ?? ''}}">

                            @error('opcao3')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        
                        </div>
                    </article>

                    


                    <div class="row mt-2 justify-content-end">
                        <div class="col-6 col-md-2">
                            <a href="{{ route('enquetes.index') }}" class="btn btn-full btn-secondary mt-2"> Cancelar </a>
                        </div>
                        <div class="col-6 col-md-2">
                            <button type="submit" class="btn btn-full btn-salvar mt-2">Salvar</button>
                        </div>
                    </div>
                </form>
            </article>
        </section>
    </div>
@endsection