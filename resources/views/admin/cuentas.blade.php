@extends('adminlte::page')
@section('content')
    <div class="container">
        <h1>Cuentas</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Email</th>
                    <th>Plan</th>
                    <th>Estado</th>
                    <th>Datos de pago</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($cuentas as $cuenta)
                    <tr>
                        <td>{{ $cuenta->id }}</td>
                        <td>{{ $cuenta->email }}</td>
                        <td>{{ $cuenta->plan }}</td>
                        <td>
                            @php 
                                $estado = "";
                            @endphp
                            @if ($cuenta->estado == 1)
                                @php 
                                    $estado = "Activo";
                                @endphp
                            @elseif ($cuenta->estado == 0)
                                @php 
                                    $estado = "Inactivo";
                                @endphp
                            @endif
                            {{ $estado }}
                        </td>
                        <td>{{ $cuenta->datos_de_pago }}</td>
                        <td>
                            <a href="{{ route('cuentas-edit', ['id' => $cuenta->id]) }}" class="btn btn-primary">Editar</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <nav aria-label="Navegación de Cuentas">
            <ul class="pagination justify-content-center">
                @if($cuentas->currentPage() > 1)
                    <li class="page-item"><a class="page-link" href="{{ $cuentas->previousPageUrl() }}" tabindex="-1">Anterior</a></li>
                @endif

                @for ($i = 1; $i <= $cuentas->lastPage(); $i++)
                    <li class="page-item {{ ($cuentas->currentPage() == $i) ? 'active' : '' }}"><a class="page-link" href="{{ $cuentas->url($i) }}">{{ $i }}</a></li>
                @endfor

                @if($cuentas->currentPage() < $cuentas->lastPage())
                    <li class="page-item"><a class="page-link" href="{{ $cuentas->nextPageUrl() }}">Siguiente</a></li>
                @endif
            </ul>
        </nav>
    </div>
@endsection
