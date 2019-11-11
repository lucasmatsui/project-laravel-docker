@extends('layout')

@section('cabecalho')
  Episódios
@endsection
  
@section('content')

@include('mensagem', ['msg' => $msg])

<form method="post" action="/temporadas/{{ $temporadaId }}/episodios/assistir">
  <button class="btn btn-primary mt-2 mb-2">Salvar</button>
  <ul class="list-group">
    @csrf
    @foreach ($episodios as $episodio)
      <li class="list-group-item d-flex justify-content-between align-items-center">
        Episodio {{ $episodio->numero }}
        <input type="checkbox" 
          name="episodios[]"
          class="episodios" 
          value="{{ $episodio->id }}"
          {{ $episodio->assistido ? 'checked' : '' }} 
        />
      </li>
    @endforeach
  </ul>
</form>

@endsection