@extends('adminlte::page')
@section('content')

<div class="container">
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger my-form-item">{{ $error }}</div>
    @endforeach
@endif
@if (session('error'))
    <br/><br/>
    <div class="alert alert-danger">
        {{ session('error') }}
    </div>
@endif
    <h3 class="titulo-admin">Añadir género</h3>
    <div class="container my-login">
        <form method="POST" class="formulario-registro" action="{{ route('genero-add') }}">
            @csrf
            <div class="form-group">
                <label for="id_api">Id Api:</label>
                <input type="number" class="form-control" id="id_api" name="id_api" value="{{ old('id_api') }}" placeholder="Id de la API (opcional)">
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre') }}" placeholder="Nombre del género">
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <br/>
    <br/>
    <br/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection