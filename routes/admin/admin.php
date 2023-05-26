<?php

use App\Http\Controllers\Admin\InterpretesController;
use App\Http\Controllers\Admin\DirectoresController;
use App\Http\Controllers\Admin\CuentasController;
use App\Http\Controllers\Admin\UsuariosController;
use App\Http\Controllers\Admin\ProductorasController;
use App\Http\Controllers\MediasController;
use App\Http\Controllers\CapitulosController;
use App\Http\Controllers\Admin\GenerosController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Middleware\AdminAccess;


Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('eliminarCuenta');
});

Route::middleware(['web', 'auth', 'admin_access'])->prefix('admin')->group(function () {
    Route::get('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    Route::post('/dashboard', function () { return view('dashboard'); })->name('dashboard');
    
    Route::get('/cuentas', [CuentasController::class, 'index'])->name('admin-cuentas');
    Route::get('/cuentas/editar/{id?}', [CuentasController::class, 'edit'])->name('cuentas-edit');
    Route::get('/usuario/editar', function () { return view('admin.editarUsuario'); });
    Route::post('/usuario/editar', [UsuariosController::class, 'edit'])->name('usuario-edit');
    Route::post('/usuario/delete', [UsuariosController::class, 'delete'])->name('usuario-delete');
    Route::post('/usuario/store', [UsuariosController::class, 'store'])->name('usuario-store');
    
    //GÉNEROS
    Route::get('/generos', [GenerosController::class, 'index'])->name('admin-generos');
    Route::post('/generos/delete', [GenerosController::class, 'delete'])->name('genero-delete');
    Route::get('/generos/add', function () { return view('admin.addGenero'); })->name('genero-form');
    Route::post('/generos/add', [GenerosController::class, 'add'])->name('genero-add');

    // RUTAS DE MEDIAS
    Route::get('/pelicula/editar', function () { return view('admin.media-buscar', ['ruta' => route('pelicula.editar'), 'tipo' => 'pelicula']); })->name('pelicula.buscar');
    Route::post('/pelicula/editar', [MediasController::class, 'prepararFormularioEdicion'])->name('pelicula.editar');
    Route::post('/editar/pelicula', [MediasController::class, 'editarPelicula'])->name('editarPelicula');
    Route::get('/pelicula/manual', [MediasController::class, 'prepararFormularioAddManual'])->defaults('tipo', 'pelicula')->name('pelicula.newManual');
    Route::post('/add/pelicula', [MediasController::class, 'addMediaManual'])->name('addPelicula');
    Route::get('/pelicula/buscar/api', function () { return view('admin.media-buscarApi', ['ruta' => route('buscarPeliculaApi')]); })->name('pelicula.buscarApi');
    Route::post('/pelicula/buscar/api', [MediasController::class, 'buscarPeliculaApi'])->name('buscarPeliculaApi');

    Route::get('/serie/editar', function () { return view('admin.media-buscar', ['ruta' => route('serie.editar'), 'tipo' => 'serie']); })->name('serie.buscar');
    Route::post('/serie/editar', [MediasController::class, 'prepararFormularioEdicion'])->name('serie.editar');
    Route::post('/editar/serie', [MediasController::class, 'editarSerie'])->name('editarSerie');
    Route::get('/serie/manual', [MediasController::class, 'prepararFormularioAddManual'])->defaults('tipo', 'serie')->name('serie.newManual');
    Route::post('/add/serie', [MediasController::class, 'addMediaManual'])->name('addSerie');
    Route::get('/serie/buscar/api', function () { return view('admin.media-buscarApi', ['ruta' => route('buscarSerieApi')]); })->name('serie.buscarApi');
    Route::post('/serie/buscar/api', [MediasController::class, 'buscarSerieApi'])->name('buscarSerieApi');
    Route::post('/add/pelicula/api', [MediasController::class, 'addPeliculaApi'])->name('addPeliculaApi');
    Route::post('/add/serie/api', [MediasController::class, 'addSerieApi'])->name('addSerieApi');

    Route::get('/add/capitulo', function () { return view('admin.temporada-addCapitulo'); })->name('addCapitulo');
    Route::post('/add/capitulo', [CapitulosController::class, 'addCapitulo'])->name('addCapituloNuevo');
    
    // RUTAS DE PRODUCTORAS
    Route::get('/productora/add', [ProductorasController::class, 'index'])->name('addProductora');
    Route::post('/productora/store', [ProductorasController::class, 'store'])->name('productora.store');
    Route::get('/productora/elegir', [ProductorasController::class, 'elegir'])->name('elegirProductora');
    Route::post('/productora/editar', [ProductorasController::class, 'edit'])->name('editarProductora');

    // RUTAS DE DIRECTORES  
    Route::post('/director/store', [DirectoresController::class, 'store'])->name('director.store');
    Route::get('/directores', [DirectoresController::class, 'index'])->name('admin-directores');
    Route::get('/directore/editar/{id?}', [DirectoresController::class, 'edit'])->name('directores-edit');
    Route::get('/directore/delete/{id?}', [DirectoresController::class, 'delete'])->name('director-delete');

    //INTERPRETES
    Route::get('/interpretes', [InterpretesController::class, 'index'])->name('admin-interpretes');
    Route::get('/interprete/editar/{id?}', [InterpretesController::class, 'edit'])->name('interpretes-edit');
    Route::get('/interprete/delete/{id?}', [InterpretesController::class, 'delete'])->name('interprete-delete');
    Route::post('/interprete/store', [InterpretesController::class, 'store'])->name('interprete.store');
});

