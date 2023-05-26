@extends('adminlte::page')
@section('content')
    @if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger my-form-item">{{ $error }}</div>
        @endforeach
    @endif
        <p class="mb-4 titulo-admin">Elige la productora</p>
        <form method="POST" action="{{ route('editarProductora') }}">
            @csrf

            <!-- Password -->
            <div class="caja m-auto my-login">
                <select class="form-select" id="seleccionarProductora" name="productora">
                    @foreach($productoras as $productora)
                        <option value="{{ json_encode($productora) }}">{{ $productora->nombre }}</option>
                    @endforeach
                </select>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary">Editar</button>
            </div>
        </form>
    </div>
@vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection