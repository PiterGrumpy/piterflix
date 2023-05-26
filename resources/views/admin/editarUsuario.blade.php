@extends('adminlte::page')
@section('content')

<div class="container">
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger my-form-item">{{ $error }}</div>
    @endforeach
@endif
    <h3 class="titulo-admin">Editar Usuario</h3>
    <div class="container my-login">
        <form method="POST" class="formulario-registro" action="{{ route('usuario-store') }}">
            @csrf
            <div class="form-group">
                <label for="id">Id:</label>
                <input type="number" class="form-control" id="id" name="id" value="{{ old('id', isset($usuario) ? $usuario['id'] : '') }}" readonly>    
                <label for="id_cuenta">Id de la cuenta:</label>
                <input type="number" class="form-control" id="id_cuenta" name="id_cuenta" value="{{ old('id_cuenta', isset($usuario) ? $usuario['id_cuenta'] : '') }}" readonly>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" value="{{ old('nombre', isset($usuario) ? $usuario['nombre'] : '') }}" placeholder="Nombre del usuario">
            </div>
            <div class="form-group">
                <label for="nombre">Avatar:</label>
                <input type="text" class="form-control" id="avatar" name="avatar" value="{{ old('avatar', isset($usuario) ? $usuario['avatar'] : '') }}" placeholder="Nombre del usuario">
            </div>
            <div class="form-group">
                <label for="nombre">Año de nacimiento:</label>
                <input type="text" class="form-control" id="anoNacimiento" name="anoNacimiento" value="{{ old('anoNacimiento', isset($usuario) ? $usuario['anoNacimiento'] : '') }}" placeholder="Nombre del usuario">
            </div>
            <div class="form-group">
                <label for="isAdmin">Es admin:</label>
                <div class="switch">
                    <input type="hidden" name="isAdmin" value="0">
                    <input type="checkbox" id="adminSwitch" name="isAdmin" value="1" {{ old('isAdmin', isset($usuario) && $usuario['isAdmin'] == 1 ? 'checked' : '') }}>
                    <label for="adminSwitch"></label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <br/>
    <br/>
    <br/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection