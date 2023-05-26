@extends('layouts.layout')
@php 
  $player = "player";
  if(!is_null($capitulos)) {
    $player = "player2";
  }
@endphp
@section('content')

  <div class="fondo" style="background-image: url({{ $media->imagen }});">
    <div id="mi-contenedor">
    <div id="{{ $player }}">
        <h1 class="titulo titulo-reproduccion">{{ $media->titulo }}</h1>
        @if(session('message'))
            <div class="alert alert-info">
                {{ session('message') }}
            </div>
        @endif
        <div class="card mb-1 shadow-sm album-capitulos row">
          <div class="card-body my-card col">
            <p class="card-text text-truncate"><b>Director/Creador</b>: {{ $director->nombre }}<br/><b>Elenco</b>: @foreach ($actores as $actor) {{ $actor->nombre }}, @endforeach</p>
            <div class="d-flex justify-content-between align-items-center">
            @auth
              @if(strcasecmp($media->tipo, "serie") == 0)
                @include('components.temporadas')
              @else
              <div></div>
              @endif
            @endauth
            <div class="d-flex justify-content-between align-items-center ml-auto">
              <div class="mt-auto">
                  <small class="my-text">{{ ($media->tipo == "pelicula") ? $media->duracion." mins" : $media->tipo }}</small>
              </div>
              @auth
              <form action="{{ route('favoritos.toggle', ['id' => $media->id, 'user_id' => session()->get('current_user')]) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-link">
                      @if (Auth::user()->usuarios->find(session('current_user'))->mediasFavoritos->contains($media))
                          <i class="fas fa-heart text-danger"></i>
                      @else
                          <i class="far fa-heart"></i>
                      @endif
                  </button>
              </form>
              <form action="{{ route('descargas.toggle', ['id' => $media->id, 'user_id' => session()->get('current_user')]) }}" method="POST">
                  @csrf
                  <button type="submit" class="btn btn-link">
                      @if (Auth::user()->usuarios->find(session('current_user'))->mediasDescargados->contains($media))
                          <i class="fas fa-download text-success"></i>
                      @else
                          <i class="fas fa-download"></i>
                      @endif
                  </button>
              </form>
              @endauth
            </div>
            </div>
          </div>
          @if(!is_null($capitulos))
            @include('components.capitulos')
          @else
            @php
              $url = "https://www.youtube.com/embed/".$media->video; 
            @endphp 
              <div class="col iframe">
              @if (Auth::check() && $media->tipo == "pelicula")
                <iframe class="bd-placeholder-img card-img-top iframe" id="iframe-video" src="{{ $url }}" allowfullscreen></iframe>
              @else
                <img class="bd-placeholder-img card-img-top" src="{{ $media->imagen }}" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"></img>
              @endif
              </div>
          @endif      
        </div>    
      </div>
    </div>
    </div>
  </div>
       
 <!-- FONT AWESOME --> 
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">    
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.14.0/css/all.css" integrity="sha384-HzLeBuhoNPvSl5KYnjx0BT+WB0QEEqLprO+NBkkk5gbc67FTaL7XIGa2w1L0Xbgc" crossorigin="anonymous">    
@endsection