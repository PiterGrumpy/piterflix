@extends('adminlte::page')
@section('content')

<div class="container">
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger my-form-item">{{ $error }}</div>
    @endforeach
@endif
    <h3 class="titulo-admin">Editar Interprete</h3>
    <div class="container my-login">
        <form method="POST" class="formulario-registro" action="{{ route('interprete.store') }}">
            @csrf
            <input type="number" id="id" name="id" value="{{ old('id', isset($interprete) ? $interprete['id'] : '') }}" hidden>    
            <div class="form-group">
                <label for="id_api">Id Api:</label>
                <input type="number" class="form-control" id="id_api" name="id_api" value="{{ old('id_api', isset($interprete) ? $interprete['id_api'] : '') }}" placeholder="Id de la API (opcional)">
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', isset($interprete) ? $interprete['nombre'] : '') }}" placeholder="Nombre del interprete">
            </div>

            <div class="form-group">
                <label for="nacionalidad">Nacionalidad:</label>
                <input type="text" class="form-control" id="nacionalidad" name="nacionalidad" value="{{ old('nacionalidad', isset($interprete) ? $interprete['nacionalidad'] : '') }}" placeholder="País del interprete">
            </div>

            <div class="form-group">
                <label for="anoNacimiento">Año de nacimiento:</label>
                <input type="number" class="form-control" id="anoNacimiento" name="anoNacimiento" value="{{ old('anoNacimiento', isset($interprete) ? $interprete['anoNacimiento'] : '') }}">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
            @if(isset($interprete))
                <a type="button" class="btn btn-danger" href="{{ route('interprete-delete', ['id' => $interprete['id']]) }}">Eliminar</a>
            @endif
        </form>
    </div>
    <br/>
    <br/>
    <br/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection