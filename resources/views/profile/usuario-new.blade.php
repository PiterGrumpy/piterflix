@extends('layouts.layout')
@php 
    $visibilidad = "";
@endphp
@section('content')
    <div class="centrado2">
        <h1 class="titulo">Nuevo usuario</h1>
        @if (session('error'))
            <div class="alert alert-danger m-auto my-login">
                {{ session('error') }}
            </div>
        @endif
        @if($errors->any())
            @foreach($errors->all() as $error)
            <div class="alert alert-danger my-form-item">{{ $error }}</div>
            @endforeach
        @endif
        <div class="avatar-container">
            <img src="https://via.placeholder.com/200x200.png/0000aa?text=cats+sit" id="avatarUsuario" class="rounded-circle avatar" width="200" height="200">
        </div>
            
            @include('components.avatares') 
            <form id="datos-perfil" action="{{ route('nuevoUsuario') }}" method="POST" style="display:none">
                @csrf
                <div class="form-row">
                    <div class="form-group col caja">
                        <label class="my-text" for="inputNombreUsuario">Nombre de Usuario</label>
                        <input type="text" class="form-control" name="nombre" id="nombreUsuario" placeholder="Nombre de usuario">
                    </div>
                        <input type="text" id="nuevoAvatar" name="avatar" hidden>
                    <div class="form-group col caja">
                        <label class="my-text" for="fecha">Fecha de nacimiento:</label>
                        <input type="date" class="form-control" id="fechaNacimiento" name="fechaNacimiento">
                    </div>
                </div>
                <button type="submit" class="btn btn-success">Guardar cambios</button>
            </form>
    </div>

<script type="text/javascript">
    document.getElementById('fila-avatares').style.display = "block";        
    let form = document.getElementById("datos-perfil");
    let btn_avatares = document.getElementById("btn-avatares");
    form.style.display = "block";
    btn_avatares.style.display = "block";
    
    function asignarAvatar(avatar) {
        console.log(avatar);
        document.getElementById("nuevoAvatar").value = avatar;
        document.getElementById("avatarUsuario").src = avatar;
    }
</script>
@endsection