@extends('layout');

@section('cabecalho')
  Séries
@endsection

@section('content')

@if(!empty($msg))
  <div class="alert alert-success">
    {{ $msg }} 
  </div>
@endif

<a href="/series/criar" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
  @foreach ($series as $serie)
<li class="list-group-item">{{ $serie->nome }}</li>
  @endforeach
</ul>
@endsection