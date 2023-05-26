@extends('layouts.layout')

@section('content')

    <div class="centrado contenedor-avatares">
            <h1 class="titulo">Usuarios</h1>
            <div class="row w-100 justify-content-center fila-avatares">
                
                @foreach ($usuarios as $usuario)
                    
                    <div class="col-3">
                    <button type="button" class="btn">
                    <a href="{{ route('perfil', ['usuario' => $usuario->id, 'isAdmin' => $usuario->isAdmin]) }}" id="{{ $usuario->id }}" data-id="{{ $usuario->id }}">
                            <img src="{{ $usuario->avatar }}" class="rounded-circle avatar" width="200" height="200">
                        </a>
                        <p class="nombre-avatar">{{ $usuario->nombre }}</p>
                    </button>
                    </div>
                @endforeach
        </div>
    </div>

@endsection