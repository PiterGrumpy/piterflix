@extends('adminlte::page')
@section('content')

@if($errors->any())
        @foreach($errors->all() as $error)
            <div class="alert alert-danger my-form-item">{{ $error }}</div>
        @endforeach
@endif
@if (session('unfound'))
        <br/><br/>
        <div class="alert alert-danger m-auto my-login">
            {{ session('unfound') }}
        </div>
@endif
@if(session()->has('medias'))
    <?php
        $visible1 = "label-hidden"; $visible2 = "visible";
        $medias = session()->get('medias');
        if($tipo == "pelicula") {
            $destino = route('editarPelicula');
        }else if ($tipo == "serie"){
            $destino = route('editarSerie');
        }
    ?>
@else
    <?php
        $visible1 = "visible"; $visible2 = "label-hidden";
        $medias = [];
        $destino = ""; 
    ?>
@endif

    <div class="m-auto my-login {{ $visible1 }}" id="primerFormulario">
   
    <p><br/></p>
    <p class="mb-4">Introduce el <b>nombre</b> o <b>id</b> de la {{ $tipo }}</p>
        <form method="POST" action="{{ $ruta }}">
            @csrf
            <input id="tipoMedia" value="{{ $tipo }}" type="text" name="tipoMedia" hidden/>
            <!-- Password -->
            <div class="caja">
                <input id="nombreMedia" class="form-control" type="text" name="nombreMedia" placeholder="Nombre de la {{ $tipo }}"/>
            </div>
            <div class="caja">
                <input id="idMedia" class="form-control" type="number" name="idMedia" placeholder="Id de la {{ $tipo }}"/>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>
    </div>

    <div class="m-auto my-login {{ $visible2 }}" id="segundoFormulario">
        <p class="mb-4">Elige la {{ $tipo }}</p>
        <form method="POST" action="{{ $ruta }}">
            @csrf
            <input id="tipoMedia" value="{{ $tipo }}" type="text" name="tipoMedia" hidden/>
            <div class="caja">
            <select class="form-select" id="seleccionarMedia" name="idMedia">
                @foreach($medias as $media)
                    <option value="{{ $media->id }}">{{ $media->titulo }}</option>
                @endforeach
            </select>
            
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>
    </div>

    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection