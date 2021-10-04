@extends('adminlte::page')
@section('title', 'SIPSUTERMCFE')
@section('content_header')
    <link rel="stylesheet" href="{{ asset('css/estilos.css') }}">
@stop
<script src="{{ URL::asset('css/estilos.css') }}"></script>

@section('content')
<div class="container">
<h1>Bienvenido</h1>
<div>
    <script>
        const url1 = "https://pokeapi.co/api/v2/pokemon/18/"; 
        fetch(url1)
  .then((response) => response.json())
  .then((pokemon1) => {
    let element = document.getElementById("elemento");
    element.innerHTML = `<p>Nombre: ${pokemon1.name}<p>
<img src='${pokemon1.sprites.front_default}'><p>Peso: ${pokemon1.height}<p><p>Experiencia: ${pokemon1.base_experience}<p>`;
    console.log(pokemon);
  })
  .catch((error) => console.log(error));
    </script>

    <button class="btn-sm">Vacaciones propuestas por el usuario</button>
    <button class="btn-sm">Control de vaciones</button>
    <div class="elemento"></div>
    </div>
@endsection


