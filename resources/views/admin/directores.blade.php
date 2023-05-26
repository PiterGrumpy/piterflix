@extends('adminlte::page')
@section('content')
    <div class="container">
        <h1>Directores</h1>
        <table class="table table-striped">
            <thead>
                <tr>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td><a href="{{ route('directores-edit') }}" class="btn btn-success w-50">Añadir nuevo director</a></td>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Nacionalidad</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($directores as $director)
                    <tr>
                        <td>{{ $director->id }}</td>
                        <td>{{ $director->nombre }}</td>
                        <td>{{ $director->nacionalidad }}</td>
                        <td>
                            <a href="{{ route('directores-edit', ['id' => $director->id]) }}" class="btn btn-primary">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <nav aria-label="Navegación de Directores">
            <ul class="pagination justify-content-center">
                @if($directores->currentPage() > 1)
                    <li class="page-item"><a class="page-link" href="{{ $directores->previousPageUrl() }}" tabindex="-1">Anterior</a></li>
                @endif

                @for ($i = 1; $i <= $directores->lastPage(); $i++)
                    <li class="page-item {{ ($directores->currentPage() == $i) ? 'active' : '' }}"><a class="page-link" href="{{ $directores->url($i) }}">{{ $i }}</a></li>
                @endfor

                @if($directores->currentPage() < $directores->lastPage())
                    <li class="page-item"><a class="page-link" href="{{ $directores->nextPageUrl() }}">Siguiente</a></li>
                @endif
            </ul>
        </nav>
    </div>
@endsection
