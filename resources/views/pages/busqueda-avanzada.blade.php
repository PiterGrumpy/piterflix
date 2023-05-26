@extends('layouts.layout')
@php 

    $generos = DB::table('generos')->get();
@endphp
@section('content')
<h1 class="titulo">Búsqueda Avanzada</h1>
<div class="my-text">
  <form action="/busqueda/respuesta" method="POST">
    @csrf

    <div class="my-form-item busqueda-item">
      <p>Tipo</p>
      <table id="tabla_busqueda">              
        <tr>
          <td>
              <div class="form-check filas_busqueda">
                  <input class="form-check-input" type="radio" name="tipo" id="tipoMedia1" value="pelicula">
                  <label class="form-check-label" for="tipoMedia1">Películas</label>
              </div>
          </td>
          <td>
              <div class="form-check filas_busqueda">
                  <input class="form-check-input" type="radio" name="tipo" id="tipoMedia2" value="serie">
                  <label class="form-check-label" for="tipoMedia2">Series</label>
              </div>
          </td>
          <td>
              <div class="form-check filas_busqueda">
                  <input class="form-check-input" type="radio" name="tipo" id="tipoMedia3" value="todo" checked>
                  <label class="form-check-label" for="tipoMedia3">Todo</label>
              </div>
          </td>
        </tr>
      </table>   
    </div>  
    <div class="form-group my-form-item busqueda-item">
      <label for="titulo">Título</label>
      <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Introduce el título de la serie o película...">
    </div>

    <div class="form-group my-form-item busqueda-item">
      <label for="nombre">Nombre</label>
      <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Actor, actriz o director">
    </div>

    <div class="form-group my-form-item busqueda-item">
      <label for="ano_lanzamiento">Año</label>
      <input type="text" class="form-control" id="ano_lanzamiento" name="ano_lanzamiento" placeholder="Año de lanzamiento">
    </div>

    <div class="my-form-item busqueda-item">
      <p>Género</p>
      <table id="tabla_busqueda">
          @foreach ($generos as $index => $genero)
              @if (intval($index) % 4 == 0)
                  <tr>
              @endif
              <td>
                  <div class="form-check filas_busqueda">
                      <input class="form-check-input" type="checkbox" name="generos[]" id="genero_{{ $genero->nombre }}" value="{{ $genero->nombre }}">
                      <label class="form-check-label" for="genero_{{ $genero->nombre }}">
                          {{ $genero->nombre }}
                      </label>
                  </div>
              </td>
              @if (intval($index) % 4 == 3 || $loop->last)
                  </tr>
              @endif
          @endforeach
      </table>
      
      <button type="submit" class="btn btn-success">Buscar</button>    
    </div>  
  </form>
</div>                                     
@endsection