@extends('layouts.layout')
@php
  $array_titulos = [
    "pelicula" => "Películas",
    "serie" => "Series",
    "recomendados" => "Recomendados",
    "novedades" => "Novedades",
    "proximamente" => "Próximamente"
  ];
  $titulo = $array_titulos[$section];
 
  $principal_section = ["pelicula", "serie"];
  $secondary_section = ["novedades", "recomendados", "proximamente"];
  $rows = "";
  $colums = "";
  
  if(in_array($section, $principal_section)) {
    $rows = 'row';
    $colums = 'col-md-2';
    if(!isset($medias)) {
      $medias = [];
    }
  } else if (in_array($section, $secondary_section)) {
    $colums = 'col-md-12';
    if(!isset($medias)) {
      $medias = [];
    }
  }

  
@endphp
@section('content')
<h1 class="titulo">{{$titulo}}</h1>
  <div class="album py-5">
    <div class="container">

      <div class="{{$rows}}">
      @foreach ($medias as $media)
      <div class="{{$colums}} my-card">
        <div class="card mb-1 shadow-sm h-100">
          <img class="bd-placeholder-img card-img-top" src="{{ in_array($section, $principal_section) ? $media->poster : $media->imagen }}" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"></img>

          <div class="card-body my-card">
            <p class="card-text text-truncate">{{ $media->titulo }}</p>
            <div class="d-flex justify-content-between align-items-center">
              <div class="">
              <a class="btn btn-sm btn-outline-secondary btn-success" href="{{ route('reproduccion', ['media' => $media->id]) }}">Reproducir</a>
              </div>
              <div class="mt-auto">
                <small class="my-text">{{ ($media->tipo == "pelicula") ? $media->duracion." mins" : $media->tipo }}</small>
              </div>
            </div>
          </div>
        </div>
      </div>
        @endforeach
      </div>
    </div>
  </div>
 @endsection