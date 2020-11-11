@extends('layouts.app')

@section('content')
    <div class="container">
        @foreach ($usuarios as $user)
            <h3> {{$user->email}} </h3>
            <h3> {{$user->name}} </h3>
            <h3> {{$user->username}} </h3>
            <hr>
        @endforeach
    </div>
@endsection