@extends('layout')

@section('cabecalho')
  Séries
@endsection

@section('content')

@if(!empty($msg))
  <div class="alert alert-success">
    {{ $msg }} 
  </div>
@endif

<a href="{{ route('form_criar_senha') }}" class="btn btn-dark mb-2">Adicionar</a>

<ul class="list-group">
  @foreach ($series as $serie)
  <li class="list-group-item d-flex justify-content-between align-items-center">
    {{ $serie->nome }}
    <span class="d-flex">
      <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm mr-2">
        <i class="fas fa-external-link-alt"></i>
      </a>
      <form method="POST" action="/series/{{ $serie->id }}"
      onsubmit="return confirm('Tem certeza que deseja remover a série {{ addslashes($serie->nome) }} ?')">
        @csrf
        @method('DELETE')
        <button class="btn btn-danger btn-sm">
          <i class="far fa-trash-alt"></i>
        </button>
      </form>
    </span>

  </li>
  @endforeach
</ul>
@endsection