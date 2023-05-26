<div>
    <select id="selectionSeasson" data-media-id="{{ $media->id }}" class="form-select bg-dark text-white" aria-label="Default select example">
        <option selected>Elige la temporada...</option>
        @foreach($temporadas as $temporada)
            <option value="temporada{{ $temporada->n_temporada }}">Temporada {{ $temporada->n_temporada }}</option>    
        @endforeach
        
    </select>
</div>

<script type="text/javascript">
    current_seasson = document.getElementById("selectionSeasson");
    current_seasson.addEventListener("change", () =>{
        selected_option = current_seasson.value;
        media_id = current_seasson.getAttribute('data-media-id');
        console.log(media_id);
        temporada = selected_option.substring(9);
        location.href ='/reproduccion/' + media_id + '/' + temporada;
    })
</script>