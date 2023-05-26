@extends('layouts.layout')

@section('cabecera')
<div id="myCarousel" class="carousel slide" data-bs-ride="carousel">
    <div class="carousel-indicators">
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="1" aria-label="Slide 2"></button>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="2" aria-label="Slide 3"></button>
    </div>
    <div class="carousel-inner">
      <div class="carousel-item active">
        <img class="bd-placeholder-img" width="100%" src="{{ $medias[0]->imagen }}">
        <div class="container">
          <div class="carousel-caption text-start">
            <h1 class="titulo-carrusel">{{ $medias[0]->titulo }}</h1>
            <p>{{ $medias[0]->descripcion }}</p>
            <p><a class="btn btn-lg btn-success" href="{{ route('reproduccion', ['media' => $medias[0]->id]) }}">Reproducir</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img class="bd-placeholder-img" width="100%" src="{{ $medias[1]->imagen }}">
        <div class="container">
          <div class="carousel-caption">
            <h1 class="titulo-carrusel">{{ $medias[1]->titulo }}</h1>
            <p>{{ $medias[1]->descripcion }}</p>
            <p><a class="btn btn-lg btn-success" href="{{ route('reproduccion', ['media' => $medias[1]->id]) }}">Reproducir</a></p>
          </div>
        </div>
      </div>
      <div class="carousel-item">
      <img class="bd-placeholder-img" width="100%" src="{{ $medias[2]->imagen }}">
        <div class="container">
          <div class="carousel-caption text-end">
            <h1 class="titulo-carrusel">{{ $medias[2]->titulo }}</h1>
            <p>{{ $medias[2]->descripcion }}</p>
            <p><a class="btn btn-lg btn-success" href="{{ route('reproduccion', ['media' => $medias[2]->id]) }}">Reproducir</a></p>
          </div>
        </div>
      </div>
    </div>
    <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Previous</span>
    </button>
    <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
      <span class="carousel-control-next-icon" aria-hidden="true"></span>
      <span class="visually-hidden">Next</span>
    </button>
  </div>
@endsection

@section('content')

  @foreach($generos as $genero)
    <h1 class="nombre-genero">{{ $genero->nombre }}</h1>
    <div class="album py-5">
    <div class="container">
      <div class="row">
      @php
        $i = 0;
      @endphp
      @while($i < 4 && $i < count($mediasGenero[$genero->nombre])) 
        @php 
          $current_media = $mediasGenero[$genero->nombre][$i];
        @endphp
          <div class="col-md-3 my-card">
                <div class="card mb-4 shadow-sm h-100">
                  <img class="bd-placeholder-img card-img-top" src="{{ $current_media->poster }}" width="50%" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"></img>

                  <div class="card-body my-card">
                    <p class="card-text text-truncate">{{ $current_media->titulo }}</p>
                    <div class="d-flex justify-content-between align-items-center">
                      <div class="btn-group">
                        <a class="btn btn-sm btn-outline-secondary btn-success" href="{{ route('reproduccion', ['media' => $current_media->id]) }}">Reproducir</a>
                      </div>
                      <small class="my-text">{{ ($current_media->tipo == "pelicula") ? $current_media->duracion." mins" : $current_media->tipo }}</small>
                    </div>
                  </div>
                </div>
              </div>
          @php
            $i++;
          @endphp
      @endwhile
      </div>
    </div>
  </div>
  @endforeach

@endsection