@extends('adminlte::page')
@section('content')



<div class="container">
    <h3 class="titulo-admin">Añadir Productora</h3>
    <div class="container my-login">
        <form method="POST" class="formulario-registro" action="{{ route('productora.store') }}">
            @csrf

            <div class="form-group">
                <label for="id_api">Id Api:</label>
                <input type="number" class="form-control" id="id_api" name="api_id" placeholder="Id de la API (opcional)">
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre de la productora">
            </div>

            <div class="form-group">
                <label for="pais">País:</label>
                <input type="text" class="form-control" id="pais" name="pais" placeholder="País de la productora">
            </div>

            <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
    </div>
    <div>
        <h3 class="titulo-admin">Lista de Productoras</h3>
        <p>La siguiente lista te ayudará a echar un vistazo a las productoras que ya están en la base de datos.</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>id_api</th>
                    <th>Nombre</th>
                    <th>País</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($productoras as $productora)
                    <tr>
                        <td>{{ $productora->id }}</td>
                        <td>{{ $productora->api_id }}</td>
                        <td>{{ $productora->nombre }}</td>
                        <td>{{ $productora->pais }}</td>
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