<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Aviário Online</title>
</head>
<body>
    <div class="container-fluid col-8">
        @foreach($empresas as $emp)     
            <h3>{{$emp->nome}}</h3>
            <h4> {{$emp->slogan}} </h4>
            <p> {{$emp->descricao}} </p>
            <h5>{{$emp->telefone}}</h5>
            <h5>{{$emp->email}}</h5>
            <h5>{{$emp->ehWhats}}</h5>
            <h5>{{$emp->categoria_id}}</h5>
            <h5>{{$emp->endereco_id}}</h5>
            <hr>
        @endforeach
    </div>
</body>
</html>