@extends('adminlte::page')
@section('content')
    @php 
        $visible1 = "visible"; $visible2 = "label-hidden"; $medias = []; $imagen = ""; $destino = ""; $videoVisible = "visible"; $tipo = "Sin tipo";
    @endphp
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
            $tipo = session()->get('tipo'); 
            $imagen = 'http://image.tmdb.org/t/p/original'.$medias[0]['poster_path'];
            if($tipo == "pelicula") {
                $destino = route('addPeliculaApi');
            }else if ($tipo == "serie"){
                $destino = route('addSerieApi');
                //$videoVisible = "label-hidden";
            }
        ?>
        
    @endif

    <div class="m-auto my-login {{ $visible1 }}" id="primerFormulario">
   
    <p><br/></p>
    <p class="mb-4">Introduce el <b>nombre</b> de la media</p>
        <form method="POST" action="{{ $ruta }}">
            @csrf
            <div class="caja">
                <input id="nombreMedia" class="form-control" type="text" name="nombreMedia" placeholder="Nombre de la película"/>
            </div>

            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary">Buscar</button>
            </div>
        </form>
    </div>

    <div class="m-auto my-login {{ $visible2 }}" id="segundoFormulario">
        <p class="mb-4">Elige la {{ $tipo }}</p>
        <form method="POST" action="{{ $destino }}">
            @csrf

            <!-- Password -->
            <div class="caja">
                <select class="form-select" id="seleccionarMedia" name="media" onchange="seleccion()">
                    @foreach($medias as $media)
                        <option value="{{ json_encode($media) }}"></option>
                    @endforeach
                </select>
                <center><img src="{{ $imagen }}" id="poster_media" width="200px"></center>
                <p id="mensajeImagen" style="display:none"><b>Imagen no disponible</b></p>
                <div class="{{ $videoVisible }}">
                    <label for="videoMedia">Añade el código del vídeo</label>
                    <input id="videoMedia" class="form-control" type="text" name="video"/>
                </div>
            </div>
            <div class="d-flex justify-content-center mt-4">
                <button type="submit" class="btn btn-primary">Añadir a la base de datos</button>
            </div>
        </form>
    </div>

<script type="text/javascript">
    window.tipo = "{{ $tipo }}";
</script>

<script type="text/javascript">
    const tipo = window.tipo;      
    const select = document.getElementById("seleccionarMedia");       
    
    if(tipo === "pelicula"){
        for(let i = 0; i < select.length; i++){
            select[i].innerHTML = JSON.parse(select[i].value)["title"];
        }
    }else if(tipo === "serie"){
        for(let i = 0; i < select.length; i++){
            select[i].innerHTML = JSON.parse(select[i].value)["name"];
        }
    }
    
  function seleccion() {
    let mediaSeleccionada = select.options[select.selectedIndex].value;
    let posterMedia = document.getElementById("poster_media");
    let current_img = JSON.parse(mediaSeleccionada)["poster_path"];
    let mensajeImagen = document.getElementById("mensajeImagen");
    if(current_img === null){
        mensajeImagen.style.display = "block";
        posterMedia.style.display = "none";
    }else{
        posterMedia.style.display = "block";
        mensajeImagen.style.display = "none";
        posterMedia.src = "http://image.tmdb.org/t/p/original" + current_img;
    }
    console.log(current_img);
    
  }
  
</script>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
@endsection