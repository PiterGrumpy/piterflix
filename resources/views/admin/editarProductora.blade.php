@extends('adminlte::page')
@section('content')

<div class="container">
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger my-form-item">{{ $error }}</div>
    @endforeach
@endif
    <h3 class="titulo-admin">Editar Productora</h3>
    <div class="container my-login">
        <form method="POST" class="formulario-registro" action="{{ route('productora.store') }}">
            @csrf
            <input type="number" id="id" name="id" value="{{ old('id', $productora['id']) }}" hidden>    
            <div class="form-group">
                <label for="id_api">Id Api:</label>
                <input type="number" class="form-control" id="id_api" name="api_id" value="{{ old('api_id', $productora['api_id']) }}" placeholder="Id de la API (opcional)">
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', $productora['nombre']) }}" placeholder="Nombre de la productora">
            </div>

            <div class="form-group">
                <label for="pais">País:</label>
                <input type="text" class="form-control" id="pais" name="pais" value="{{ old('pais', $productora['pais']) }}" placeholder="País de la productora">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <br/>
    <br/>
    <br/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection