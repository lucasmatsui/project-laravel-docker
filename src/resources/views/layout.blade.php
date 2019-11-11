<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.11.1/css/all.css">
  <title>Controle de séries</title>
</head>
<body>
  <nav class="navbar navbar-expand-lg navbar-light bg-light mb-2 d-flex justify-content-between">
    <a class="navbar navbar-expand-lg" href="{{ route('listar_series') }}">Home</a>
    @auth

      <span>
        {{ Auth::user()->name }}
        <a href="/sair" class="ml-2 text-danger">Sair</a>
      </span>        
    @endauth
    @guest
      <a href="/entrar">Entrar</a>                
    @endguest
  </nav>
  <div class="container">
    <div class="jumbotron">
      <h1>@yield('cabecalho')</h1>
    </div>
    @yield('content')
  </div>
</body>
</html>