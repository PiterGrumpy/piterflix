@extends('layouts.layout')
@php 
    use App\Models\Usuario;    
    $id = request()->session()->get('current_user');
    $usuario = Usuario::find($id);
    $visibilidad = "noVisible";
@endphp

@section('content')
    <div class="centrado2">
        <h1 class="titulo">{{ $usuario->nombre }}</h1>
        <div class="avatar-container">
            <img src="{{ $usuario->avatar }}" id="avatarUsuario" class="rounded-circle avatar" width="200" height="200">
            <p class="nombre-avatar">Año de nacimiento: {{ $usuario->anoNacimiento }}</p>
            <button class="avatar-button btn btn-success" id="boton-editar" onclick="editarPerfil()">Editar Perfil</button>
        </div>
            <div class="avatar-container">
                <button class="avatar-button btn btn-success" id="btn-avatares" style="display:none" onclick="elegirAvatar(document.getElementById('fila-avatares'))">Cambiar Avatar</button>
            </div>
            @include('components.avatares') 
            <form id="datos-perfil" action="{{ route('editarUsuario') }}" method="POST" style="display:none">
                @csrf
                <div class="form-row">
                    <div class="form-group col caja">
                        <label class="my-text" for="inputNombreUsuario">Nombre de Usuario</label>
                        <input type="text" class="form-control" name="nuevoNombre" id="inputNombreUsuario" placeholder="Nombre de usuario">
                    </div>
                        <input type="text" id="nuevoAvatar" name="nuevoAvatar" hidden>
                    <div class="form-group col caja">
                        <label class="my-text" for="fecha">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="fecha" name="nuevaFecha">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Guardar cambios</button>
            </form>
    </div>

    <script type="text/javascript">
        function elegirAvatar(contenedor) {
            contenedor.style.display = "block";
        }
        function asignarAvatar(avatar) {
            console.log(avatar);
            document.getElementById("nuevoAvatar").value = avatar;
            document.getElementById("avatarUsuario").src = avatar;
        }
        function editarPerfil(){
            let form = document.getElementById("datos-perfil");
            let btn_editar = document.getElementById("boton-editar");
            let btn_avatares = document.getElementById("btn-avatares");
            form.style.display = "block";
            btn_editar.style.display = "none";
            btn_avatares.style.display = "block";
        }
    </script>
@endsection