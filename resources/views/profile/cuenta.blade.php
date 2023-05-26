@extends('layouts.layout')
@php
    use App\Models\Cuenta;
    use Illuminate\Support\Facades\Auth;

    $cuenta = Auth::user();
    $usuarios = $cuenta->usuarios;
@endphp

@section('content')
@if (session('success'))
    <br/><br/>
    <div class="alert alert-success m-auto my-login">
        {{ session('success') }}
    </div>
@endif
<div class="m-auto">
        <h1 class="titulo">{{ $cuenta->email }}</h1>
        <p class="my-text">Plan: {{ ucfirst($cuenta->plan) }}</p>
        <p class="my-text">Estado: {{ $cuenta->estado ? 'Activo' : 'Inactivo' }}</p>
        <p class="my-text">Datos de Pago: {{ $cuenta->datos_de_pago }}</p>
        <hr class="my-text">
    <h2 class="subtitulo my-text">Usuarios de la cuenta</h2>
    <table class="table my-text">
        <thead>
            <tr>
                <th class="my-text">Nombre</th>
                <th class="my-text">Año de Nacimiento</th>
                <th class="my-text">Acciones</th>
            </tr>
        </thead>
        <tbody>
            @foreach($usuarios as $usuario)
            <tr>
                <td class="my-text">{{ $usuario->nombre }}</td>
                <td class="my-text">{{ $usuario->anoNacimiento }}</td>
                <td>
                    <a href="{{ route('perfil', ['usuario' => $usuario->id, 'isAdmin' => session()->get('isAdmin')]) }}" class="btn btn-success">Ver perfil</a>
                    <a href="{{ route('eliminarUsuario', ['usuario' => $usuario->id]) }}" 
                       class="btn btn-danger" 
                       onclick="return confirm('¿Estás seguro de que deseas eliminar este usuario?');">
                       Eliminar
                    </a>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    <hr class="my-text">
        <a href='/reset/password' class="btn btn-success my-text">Cambiar Contraseña</a>
        <a href='/usuario/nuevo' class="btn btn-success my-text">Añadir nuevo usuario</a>
    <hr class="my-text">
    <form action="{{ route('eliminar_cuenta') }}" method="POST">
        @csrf
        <input type="text" class="form-control" name="cuenta_id" value="{{ $cuenta->id }}" hidden>
        <button type="submit" class="btn btn-danger"
        onclick="return confirm('¿Estás seguro de que deseas eliminar esta cuenta?');">Eliminar cuenta</button>
    </form>
</div>

@endsection
