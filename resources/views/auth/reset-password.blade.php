@extends('layouts.layout')

@section('content')
@if(session('success'))
    <div class="alert alert-success my-form-item">{{ session('success') }}</div>
@endif
<h1 class="titulo">Cambio de contraseña</h1>
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger my-form-item">{{ $error }}</div>
    @endforeach
@endif
<div class="m-auto w-40">
    <form action="{{ route('resetPassword') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="inputContrasena" class="my-text">Contraseña actual:</label>
            <input type="password" class="form-control" name="currentPassword" id="inputContrasena" placeholder="Contraseña actual">
        </div>
        <div class="form-group">
            <label for="inputNuevaContrasena" class="my-text">Nueva contraseña:</label>
            <input type="password" class="form-control" name="newPassword" id="inputNuevaContrasena" placeholder="Nueva contraseña">
        </div>
        <div class="form-group">
            <label for="inputConfirmarContrasena" class="my-text">Confirmar nueva contraseña:</label>
            <input type="password" class="form-control" name="newPassword_confirmation" id="inputConfirmarContrasena" placeholder="Confirmar nueva contraseña">
        </div>
        <button type="submit" class="w-100 mt-3 btn btn-success">Cambiar contraseña</button>
    </form>
</div>

@endsection