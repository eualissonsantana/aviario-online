
@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

        <form method="POST" action="{{ route('register') }}">
            @csrf

            <div>
                <label for="name" value="{{ __('Name') }}">Nome </label>
                <input id="name" class="block mt-1 w-full" type="text" name="name" :value="old('name')" required autofocus autocomplete="name" />
            </div>

            <div class="mt-4">
                <label for="email" value="{{ __('Email') }}">Email</label>
                <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required />
            </div>
                            
            <div class="mt-4">
                <label for="password" value="{{ __('Password') }}">Senha </label>
                <input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            </div>
                               

            <div class="mt-4">
                <label for="password_confirmation" value="{{ __('Confirm Password') }}">Confirmação</label>
                <input id="password_confirmation" class="block mt-1 w-full" type="password" name="password_confirmation" required autocomplete="new-password" />
            </div>
                        
            <div class="flex items-center justify-end mt-4">
                <a class="underline text-sm text-gray-600 hover:text-gray-900" href="{{ route('login') }}">
                    {{ __('Already registered?') }}
                </a>

                <button class="ml-4">
                    {{ __('Register') }}
                </button>
                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </form>
        </div>
    </div>
</div>
@endsection