@extends('adminlte::page')
@php 
    $temporada = session('temporada');
    $media =  session('media');
@endphp
@section('content')
<div class="container">

  

    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Añadir capítulo a la temporada {{ $temporada['n_temporada'] }} de la serie {{ $media['titulo'] }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('addCapituloNuevo') }}">
                        @csrf
                        <input type="number" id="id_media" name="id_media" value="{{ old('id_media', $media['id']) }}" hidden>
                        <input type="number" id="n_temporada" name="n_temporada" value="{{ old('n_temporada', $temporada['n_temporada']) }}" hidden>
                        <div class="card-body">
                            <h5 class="card-title">Datos del Capítulo</h5><br/>
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}">
                            </div>
                            <div class="form-group">
                                <label for="n_capitulo">Número de capítulo dentro de la temporada</label>
                                <input type="number" class="form-control" id="n_capitulo" name="n_capitulo" value="{{ old('n_capitulo') }}">
                            </div>
                            <div class="form-group">
                                <label for="duracion">Duración</label>
                                <input type="number" class="form-control" id="duracion" name="duracion" value="{{ old('duracion') }}">
                            </div>
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea class="form-control" id="descripcion" name="descripcion">{{ old('descripcion') }}</textarea>
                            </div>
                            <div class="form-group">
                                <label for="video">Vídeo</label>
                                <input class="form-control" id="video" name="video" value="{{ old('video') }}">
                            </div>
                        </div>
                        <button type="submit" class="btn btn-primary">Guardar Capítulo</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection