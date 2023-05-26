@extends('adminlte::page')
@section('content')
    <div class="container">
    @if (session('success'))
        <br/><br/>
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif
  
        <h3 class="titulo-admin">Generos</h3>

        <table class="table table-striped">
            <thead>
                <tr>
                    <td></td>
                    <td></td>
                    <td><a href="{{ route('genero-form') }}" class="btn btn-success w-50">Añadir nuevo género</a></td>
                </tr>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($generos as $genero)
                    <tr>
                        <td>{{ $genero->id }}</td>
                        <td>{{ $genero->nombre }}</td>
                        <td>
                            <form action="{{ route('genero-delete') }}" method="post">
                                @csrf
                                <input type="number" name="id_genero" value="{{ $genero->id }}" hidden/>
                                <button class="btn btn-danger" type="submit">Eliminar</button>
                            </form>
                            
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <nav aria-label="Navegación de Generos">
            <ul class="pagination justify-content-center">
                @if($generos->currentPage() > 1)
                    <li class="page-item"><a class="page-link" href="{{ $generos->previousPageUrl() }}" tabindex="-1">Anterior</a></li>
                @endif

                @for ($i = 1; $i <= $generos->lastPage(); $i++)
                    <li class="page-item {{ ($generos->currentPage() == $i) ? 'active' : '' }}"><a class="page-link" href="{{ $generos->url($i) }}">{{ $i }}</a></li>
                @endfor

                @if($generos->currentPage() < $generos->lastPage())
                    <li class="page-item"><a class="page-link" href="{{ $generos->nextPageUrl() }}">Siguiente</a></li>
                @endif
            </ul>
        </nav>
    </div>
@endsection
