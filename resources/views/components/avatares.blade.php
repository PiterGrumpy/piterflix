    <div id="fila-avatares" class="row w-100 justify-content-center {{ $visibilidad }}">   
        <div class="col-12">
            <button type="button" class="btn">
                <img src="{{ asset('storage/images/potter.jpg') }}" onclick="asignarAvatar(this.src)" class="rounded-circle avatar" width="200" height="200">
            </button>
            <button type="button" class="btn">
                <img src="{{ asset('storage/images/merida.jpg') }}" onclick="asignarAvatar(this.src)" class="rounded-circle avatar" width="200" height="200">
            </button>
            <button type="button" class="btn">
                <img src="{{ asset('storage/images/goku.jpg') }}" onclick="asignarAvatar(this.src)" class="rounded-circle avatar" width="200" height="200">
            </button>
            <button type="button" class="btn">
                <img src="{{ asset('storage/images/sparrow.jpg') }}" onclick="asignarAvatar(this.src)" class="rounded-circle avatar" width="200" height="200">
            </button>
            <button type="button" class="btn">
                <img src="{{ asset('storage/images/avatar.jpg') }}" onclick="asignarAvatar(this.src)" class="rounded-circle avatar" width="200" height="200">
            </button>
        </div>
    </div>