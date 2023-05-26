<nav class="navbar navbar-expand-md navbar-dark fixed-top bg-dark">
    <div class="container-fluid">
    <div class="navbar-brand"><img src="{{ Vite::asset('resources/images/logo.png') }}" style="width:100%; height:100%;"></div>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse" aria-controls="navbarCollapse" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarCollapse">
        <ul class="navbar-nav me-auto mb-2 mb-md-0">
          <li class="nav-item">
            <a class="nav-link active" aria-current="page" href="/">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/peliculas">Películas</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="/series">Series</a>
          </li>
          <li class="nav-item dropdown">
            <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Más</a>
            <ul class="dropdown-menu">
              <li><a class="dropdown-item" href="/recomendados">Recomendados</a></li>
              <li><a class="dropdown-item" href="/novedades">Novedades</a></li>
              <li><a class="dropdown-item" href="/proximamente">Próximamente</a></li>
            </ul>
          </li>
        </ul>
        
        @if (Auth::check()) <!-- comprueba si hay un usuario logeado -->
         
          <form class="d-flex" role="search" method="post" action="/busqueda/respuesta">
            @csrf
            <ul class="navbar-nav me-auto mb-2 mb-md-0">
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-bs-toggle="dropdown" aria-expanded="false">Más</a>
                <ul class="dropdown-menu">
                  <li><a class="dropdown-item" href={{ route('perfil', ['usuario' => session()->get('current_user'), 'isAdmin' => session()->get('isAdmin')]) }}>Mi perfil</a></li>
                  <li><a class="dropdown-item" href="{{ route('cuenta') }}">Mi cuenta</a></li>
                  @if (session()->get('isAdmin'))
                  <li><a class="dropdown-item" href="{{ route('dashboard') }}">Panel de administrador</a></li>
                  @endif
                  <li><a class="dropdown-item" href="{{ route('cerrar_sesion') }}">Cerrar Sesión</a></li> 
                </ul>
              </li>
            </ul>
            <input class="form-control me-2" type="search" name="busqueda" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        @else
          <form class="d-flex" role="search" method="post" action="/busqueda/respuesta">
            @csrf
            <div class="btn btn-success a-btn"><a class="a-btn" href="/registro">Suscríbete</a></div>
            <div class="btn btn-success a-btn"><a class="a-btn" href="/login">Entra</a></div>
            <input class="form-control me-2" type="search" name="busqueda" placeholder="Search" aria-label="Search">
            <button class="btn btn-outline-success" type="submit">Search</button>
          </form>
        @endif

      </div>
    </div>
  </nav>
  