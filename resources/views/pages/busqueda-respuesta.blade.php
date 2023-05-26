@extends('layouts.layout')

@section('content')
    @if(count($busqueda) == 0)
        <h1 class="titulo">No hay resultados para tu búsqueda</h1>
    @else
        <h1 class="titulo">Resultados de tu búsqueda</h1>
    @endif
    <div id="container-btn-busqueda" class="container">
        <a id="btn-busqueda-avanzada" href="/busqueda/avanzada" class="btn btn-outline-success" type="button">
            Búsqueda Avanzada
        </a>
        <div id="resultado-busqueda">
        <div class="album py-5">
            <div class="container">
                <div class="row">
            @foreach($busqueda as $current)
                        <div class="col-md-3 my-card">
                            <div class="card mb-2 shadow-sm h-100">
                                <img class="bd-placeholder-img card-img-top" src="{{ $current->poster }}" role="img" preserveAspectRatio="xMidYMid slice" focusable="false"></img>

                                <div class="card-body my-card">
                                    <p class="card-text text-truncate">{{ $current->titulo }}</p>
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="btn-group">
                                            <a type="button" href="{{ route('reproduccion', ['media' => $current->id]) }}" class="btn btn-sm btn-outline-secondary btn-success">Reproducir</a>
                                        </div>
                                        <small class="my-text">{{ ($current->tipo == "pelicula") ? $current->duracion." mins" : $current->tipo }}</small>
                                    </div>
                                </div>
                            </div>
                        </div>        
            @endforeach
                </div>
            </div>
        </div>
        </div>
    </div>
@endsection