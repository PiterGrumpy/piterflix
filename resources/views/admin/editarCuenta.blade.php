@extends('adminlte::page')
@section('content')

<div class="container">
@if($errors->any())
    @foreach($errors->all() as $error)
        <div class="alert alert-danger my-form-item">{{ $error }}</div>
    @endforeach
@endif
<h3 class="titulo-admin">Usuarios</h3>

<table class="table table-striped">
    <thead>
        <tr>
            <th>ID</th>
            <th>Nombre</th>
            <th>Año de nacimiento</th>
            <th>Rol</th>
            <th>Avatar</th>
            <th></th>
            <th></th>
        </tr>
    </thead>
    <tbody>
        @foreach ($usuarios as $usuario)
            <tr>
                <td>{{ $usuario->id }}</td>
                <td>{{ $usuario->nombre }}</td>
                <td>{{ $usuario->anoNacimiento }}</td>
                <td>{{ $usuario->isAdmin == 1 ? 'Administrador' : 'Usuario' }}</td>
                <td><img src="{{ $usuario->avatar }}" class="rounded-circle" width="50" height="50"></td>
                <td>
                    <form action="{{ route('usuario-edit') }}" method="post">
                        @csrf
                        <input type="number" name="id_usuario" value="{{ $usuario->id }}" hidden/>
                        <button class="btn btn-primary" type="submit">Editar</button>
                    </form>
                    
                </td>
                <td>
                    <form action="{{ route('usuario-delete') }}" method="post">
                        @csrf
                        <input type="number" name="id_usuario" value="{{ $usuario->id }}" hidden/>
                        <button class="btn btn-danger" type="submit">Eliminar</button>
                    </form>
                    
                </td>
            </tr>
        @endforeach
    </tbody>
</table>
    </div>
    <br/>
    <br/>
    <br/>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection