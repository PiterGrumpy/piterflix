<div class="container col" id="capitulos">
  <div class="row">
  @foreach($capitulos as $capitulo) 
    @php 
        $url = "https://www.youtube.com/embed/".$capitulo->video;
    @endphp
      <div class="col-12 col-md-4 col-lg-3 my-card">
        <div class="card mb-4 shadow-sm h-100">
            <iframe class="bd-placeholder-img card-img-top" id="iframe-video" src="{{ $url }}" allowfullscreen></iframe>
            <div class="card-body my-card">
                <p class="card-text text-truncate">{{ $capitulo->nombre }} Temporada {{$capitulo->n_temporada}}</p>
                <p class="card-text text-truncate">{{ $capitulo->descripcion }}</p>
                <div class="d-flex justify-content-between align-items-center">
                  <small class="my-text">{{ $capitulo->duracion." mins" }}</small>
                </div>
            </div>
        </div>
      </div>
  @endforeach
  </div>
</div>
