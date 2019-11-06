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
    <span id="nome-serie-{{ $serie->id }}">{{ $serie->nome }}</span>

    <div class="input-group w-50" hidden id="input-nome-serie-{{ $serie->id }}">
        <input type="text" class="form-control" value="{{ $serie->nome }}">
        <div class="input-group-append">
            <button class="btn btn-primary" onclick="editarSerie({{ $serie->id }})">
                <i class="fas fa-check"></i>
            </button>
            @csrf
        </div>
    </div>

    <span class="d-flex">

      <button class="btn btn-primary btn-sm mr-2" onclick="toogleInput({{ $serie->id }})">
        <i class="fas fa-edit"></i>
      </button>

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

<script>
  function toogleInput($serieId)
  {
    const nome = document.querySelector(`#nome-serie-${$serieId}`);
    const input = document.querySelector(`#input-nome-serie-${$serieId}`);

    if(input.hasAttribute('hidden')) {
      nome.hidden = true;
      input.removeAttribute('hidden');

      return true;
    }
    nome.removeAttribute('hidden');
    input.hidden = true;
  }
</script>
@endsection

