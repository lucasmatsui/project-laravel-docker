@extends('layout')

@section('cabecalho')
  Séries
@endsection

@section('content')

@include('mensagem', ['msg' => $msg])

@auth
  <a href="{{ route('form_criar_serie') }}" class="btn btn-dark mb-2">Adicionar</a>     
@endauth

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

      <a href="/series/{{ $serie->id }}/temporadas" class="btn btn-info btn-sm mr-2">
        <i class="fas fa-external-link-alt"></i>
      </a>

      @auth
        <button class="btn btn-primary btn-sm mr-2" onclick="toogleInput({{ $serie->id }})">
            <i class="fas fa-edit"></i>
        </button>
      @endauth
      
      @auth
        <form method="POST" action="/series/{{ $serie->id }}"
          onsubmit="return confirm('Tem certeza que deseja remover a série {{ addslashes($serie->nome) }} ?')">
          @csrf
          @method('DELETE')
          <button class="btn btn-danger btn-sm">
            <i class="far fa-trash-alt"></i>
          </button>
        </form>
      @endauth
      
    </span>

  </li>
  @endforeach
</ul>

<script>
  function toogleInput(serieId)
  {
    const nome = document.querySelector(`#nome-serie-${serieId}`);
    const input = document.querySelector(`#input-nome-serie-${serieId}`);

    if(input.hasAttribute('hidden')) {
      nome.hidden = true;
      input.removeAttribute('hidden');

      return true;
    }
    nome.removeAttribute('hidden');
    input.hidden = true;
  }

  function editarSerie(serieId) {
    let formData = new FormData();
    const nome = document.
      querySelector(`#input-nome-serie-${serieId} > input`)
      .value;
    const token = document.querySelector(`input[name="_token"]`).value;

    formData.append('nome', nome);
    formData.append('_token', token);
  
    const url = `/series/${serieId}/editarNome`;

    fetch(url, {
      body: formData,
      method: 'POST'
    }).then(() => {
      toogleInput(serieId);
      document.querySelector(`#nome-serie-${serieId}`).textContent = nome;
    });
  }

</script>
@endsection

