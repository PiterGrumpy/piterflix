@extends('adminlte::page')

@php 
    $generos = $media->generos;
    $interpretes_media = $media->interpretes;
    $ruta = "";
    if(strtolower($media->tipo) == "pelicula"){
        $ruta = route('editarPelicula');
    }else if(strtolower($media->tipo) == "serie"){
        $ruta = route('editarSerie');
    }
@endphp
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Editar {{ $media->tipo }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ $ruta }}">
                        @csrf
                        <input type="number" id="id_media" name="id_media" value="{{ old('id_media', $media->id) }}" hidden>
                        <input type="text" id="tipo_media" name="tipo" value="{{ old('id_tipo', $media->tipo) }}" hidden>
                        <div class="card-body">
                        <h5 class="card-title">Datos de la película</h5><br/>
                        <div class="form-group">
                            <label for="titulo">Título</label>
                            <input type="text" class="form-control" id="titulo" name="titulo" value="{{ old('titulo', $media->titulo) }}">
                        </div>
                        <div class="form-group">
                            <label for="titulo_original">Título original</label>
                            <input type="text" class="form-control" id="titulo_original" name="titulo_original" value="{{ old('titulo_original', $media->titulo_original) }}">
                        </div>
                        <div class="form-group">
                            <label for="idioma_original">Idioma original</label>
                            <input type="text" class="form-control" id="idioma_original" name="idioma_original" value="{{ old('idioma_original', $media->idioma_original) }}">
                        </div>
                        <div class="form-group">
                            <label for="duracion">Duración</label>
                            <input type="number" class="form-control" id="duracion" name="duracion" value="{{ old('duracion', $media->duracion) }}">
                        </div>
                        <div class="form-group">
                            <label for="anoEstreno">Año de estreno</label>
                            <input type="number" class="form-control" id="anoEstreno" name="anoEstreno" value="{{ old('anoEstreno', $media->anoEstreno) }}">
                        </div>
                        <div class="form-group">
                            <label for="descripcion">Descripción</label>
                            <textarea class="form-control" id="descripcion" name="descripcion">{{ old('descripcion', $media->descripcion) }}</textarea>
                        </div>
                        <div class="form-group">
                            <label for="image">Imagen</label>
                            <input class="form-control" id="imagen" name="imagen" value="{{ old('image', $media->imagen) }}">
                        </div>
                        <div class="form-group">
                            <label for="poster">Poster</label>
                            <input class="form-control" id="poster" name="poster" value="{{ old('poster', $media->poster) }}">
                        </div>
                        <div class="form-group">
                            <label for="video">Vídeo</label>
                            <input class="form-control" id="video" name="video" value="{{ old('video', $media->video) }}">
                        </div>
                    </div>
                    <div class="card-body">
                        <h5 class="card-title">Relaciones con otras tablas</h5><br/>
                        <div class="form-group">
                        <label for="idProductora">Productora</label>
                        <h6 class="font-italic">Si la productora no aparece añádela <a href="{{ route('addProductora') }}">aquí</a></h6>
                            <select class="form-control" id="idProductora" name="idProductora">
                                <option value="desconocido">Ninguna</option>
                                @foreach($productoras_db as $productora)
                                    <option value="{{ $productora->id }}" {{ $media->productora->id == $productora->id ? 'selected' : '' }}>{{ $productora->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                        <label for="idDirector">Director</label>
                        <h6 class="font-italic">Si el director no aparece añádelo <a href="{{ route('directores-edit') }}">aquí</a></h6>
                            <select class="form-control" id="idDirector" name="idDirector">
                            <option value="desconocido">Ninguno</option>
                                @foreach($directores_db as $director)
                                    <option value="{{ $director->id }}" {{ $media->directores->first()->id == $director->id ? 'selected' : '' }}>{{ $director->nombre }}</option>
                                @endforeach
                            </select>
                        </div>

                        <div class="form-group">
                            <label for="idinterpretes">Interpretes</label>
                            <h6 class="font-italic">Si el interprete no aparece añádelo <a href="{{ route('interpretes-edit') }}">aquí</a></h6>
                            <label for="busquedaInterpretes">Buscar actores/actrices:</label>
                            <input class="form-control" type="text" name="busqueda" id="busquedaInterpretes" placeholder="Introduzca el nombre del actor/actriz">
                            <ul id="resultados">
                                @foreach($interpretes_media as $current)
                                    <li>
                                        <label>{{ $current->nombre }}</label>
                                        <input type="checkbox" name = 'interpretes[]' value ="{{ $current->id }}" checked>
                                    </li>
                                @endforeach
                            </ul>
                            <button type="button" class="btn btn-primary" id="buscarInterprete">Buscar</button>
                        </div>
                        

                        <label for="generos">Generos</label>
                        <button id="btn-desplegar" type="button" class="btn btn-light">Mostrar géneros</button><br/><br/>
                        <div id="div-generos" style="display: none;">
                            <div class="form-group">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>ID</th>
                                            <th>Nombre</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($generos_db as $genero)
                                            <tr>
                                                <td>{{ $genero->id }}</td>
                                                <td>{{ $genero->nombre }}</td>
                                                <td>
                                                    <input type="checkbox" id="generos" name="generos[]" value="{{ $genero->id }}" 
                                                        {{ in_array($genero->id, $generos->pluck('id')->toArray()) ? 'checked' : '' }}>
                                                </td>

                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Guardar Cambios</button>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    const btnDesplegar = document.getElementById('btn-desplegar');
    const divGeneros = document.getElementById('div-generos');

    btnDesplegar.addEventListener('click', function() {
        if (divGeneros.style.display === 'none') {
            divGeneros.style.display = 'block';
        } else {
            divGeneros.style.display = 'none';
        }
    });

    // Búsqueda de interpretes

    var interpretes = @json($interpretes);
    document.getElementById('buscarInterprete').addEventListener('click', function() {
        let busqueda = document.getElementById('busquedaInterpretes').value.toLowerCase();
        let interpretes = {!! json_encode($interpretes) !!};
        let resultados = document.getElementById('resultados');
        //resultados.innerHTML = '';

        interpretes.forEach(interprete => {
            if(interprete.nombre.toLowerCase().includes(busqueda)) {
                let li = document.createElement('li');
                let checkbox = document.createElement('input');
                checkbox.type = 'checkbox';
                checkbox.name = 'interpretes[]';
                checkbox.value = interprete.id;
                let label = document.createElement('label');
                label.textContent = interprete.nombre;
                li.appendChild(checkbox);
                li.appendChild(label);
                resultados.appendChild(li);
            }
        });
    });

</script>
@endsection