@extends('layouts.app', ['bannersCarousel' => $bannersRetangulares])

@section('content')
    <section class="content-child">

        <h1>
            @if(isset($user))
                Editar usuário 
            @else 
                Cadastrar novo usuário
            @endif
        </h1>
        <section class="py-4 row justify-content-center">
            <article class="col-md-4 ">
                <section class="card">
                    <article class="card-body">
                        @if(isset($user))
                            <form action = "{{ url("painel/users/$user->id")}}" method = "POST">
                                @method('PUT')
                        @else
                            <form action = "{{ route('users.create') }}" method = "POST">
                        @endif
                            @csrf
                            <div class="form-group">
                                <label for="name" class="col-form-label">{{ __('Nome') }}</label>
                                <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Nome e sobrenome" name="name" value="{{$user->name ?? ''}}" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            
                            </div>

                            <div class="form-group">
                                <label for="username" class="col-form-label ">{{ __('Username') }}</label>
                                <input id="username" type="text" class="form-control @error('username') is-invalid @enderror" name="username" value="{{$user->username ?? ''}}" required autocomplete="username">

                                @error('username')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="password" class="col-form-label">{{ __('Senha') }}</label>                    
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                               
                            </div>

                            <div class="form-group">
                                <label for="password-confirm" class="col-form-label ">{{ __('Confirmação de senha') }}</label>
                                <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">
                                
                            </div>

                            <button type="submit" class="btn btn-salvar">Salvar</button>
                        </form>
                    </article>
                </section>
            </article>
        </section>
    </div>
@endsection