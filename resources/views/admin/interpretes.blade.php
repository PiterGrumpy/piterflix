@extends('adminlte::page')
@section('content')
    <div class="container">
    @if (session('success'))
        <br/><br/>
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
        <h3 class="titulo-admin">Intérpretes</h3>

        <table class="table">
        <thead>
            <tr>
                <td></td>
                <td></td>
                <td></td>
                <td><a href="{{ route('interpretes-edit') }}" class="btn btn-success w-50">Nuevo intérprete</a></td>
            </tr>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Nacionalidad</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach ($interpretes as $interprete)
                <tr>
                    <td>{{ $interprete->id }}</td>
                    <td>{{ $interprete->nombre }}</td>
                    <td>{{ $interprete->nacionalidad }}</td>
                    <td>{{ $interprete->pais_de_origen }}</td>
                    <td>
                        <a href="{{ route('interpretes-edit', ['id' => $interprete->id]) }}" class="btn btn-primary">Editar</a>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    <nav aria-label="Navegación de interpretes">
        <ul class="pagination justify-content-center">
            @if($interpretes->currentPage() > 1)
                <li class="page-item"><a class="page-link" href="{{ $interpretes->previousPageUrl() }}" tabindex="-1">Anterior</a></li>
            @endif

            @for ($i = 1; $i <= $interpretes->lastPage(); $i++)
                <li class="page-item {{ ($interpretes->currentPage() == $i) ? 'active' : '' }}"><a class="page-link" href="{{ $interpretes->url($i) }}">{{ $i }}</a></li>
            @endfor

            @if($interpretes->currentPage() < $interpretes->lastPage())
                <li class="page-item"><a class="page-link" href="{{ $interpretes->nextPageUrl() }}">Siguiente</a></li>
            @endif
        </ul>
    </nav>

    </div>
@endsection