<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\DataBaseController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\SectionsController;
use App\Http\Controllers\BusquedaController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\FavoritosController;
use App\Http\Controllers\DescargasController;
use App\Http\Controllers\Auth\NewPasswordController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/
Route::middleware(['web', 'current_user_check'])->group(function () {
    Route::get('/', [IndexController::class, 'cargarMediasCarrusel']);

    // RUTAS DE SECCIONES

    Route::get('/peliculas', [SectionsController::class, 'cargarPeliculas']);
    Route::get('/series', [SectionsController::class, 'cargarSeries']);
    Route::get('/recomendados', [SectionsController::class, 'cargarRecomendados']);
    Route::get('/proximamente', [SectionsController::class, 'cargarProximamente']);
    Route::get('/novedades', [SectionsController::class, 'cargarNovedades']);
    
    Route::get('/reproduccion/{media}/{temporada?}', [IndexController::class, 'cargarReproduccion'])->name('reproduccion');
    Route::post('favoritos/{id}/{user_id}', [FavoritosController::class, 'toggle'])->name('favoritos.toggle');
    Route::post('descargas/{id}/{user_id}', [DescargasController::class, 'toggle'])->name('descargas.toggle');

    // RUTAS DE BÚSQUEDA
    Route::get('/busqueda/avanzada', function () {
        return view('pages.busqueda-avanzada');
    });
   
    Route::match(['get', 'post'],'/busqueda/respuesta', [BusquedaController::class, 'buscar']);

    // RUTAS DE REGISTRO
    Route::get('/registro', function () {
        return view('auth.registro');
    });
    Route::post('/pago', [UsuarioController::class, 'crearCuentaSinConfirmar'])->name('pago');
    Route::get('/pago', [UsuarioController::class, 'comprobarUsuarioEnSesion'])->name('pagoFallido');
    Route::post('/cuenta/confirmacion', [RegisteredUserController::class, 'store'])->name('confirmacionCuenta');    

    Route::middleware(['auth', 'verified'])->group(function () {
    
        // RUTAS DE CUENTAS Y USUARIOS
        Route::get('/cuenta', function () {
            return view('profile.cuenta');
        })->name('cuenta');
        Route::get('/usuario/seleccionar', [AuthenticatedSessionController::class, 'getUsers'])->name('usuario_seleccion');
        Route::post('/usuario/nuevo', [UsuarioController::class, 'crear'])->name('nuevoUsuario');
        Route::get('/perfil/{usuario?}/{isAdmin?}', [UsuarioController::class, 'setUser'])->name('perfil');
        Route::post('/perfil/usuario', [UsuarioController::class, 'editar'])->name('editarUsuario');
        Route::get('/eliminar/{usuario?}', [UsuarioController::class, 'eliminar'])->name('eliminarUsuario');
        Route::get('/cerrar', [AuthenticatedSessionController::class, 'salir'])->name('cerrar_sesion');
        Route::get('/reset/password', function() {
            return view('auth.reset-password');
        });
        Route::post('/reset/password', [NewPasswordController::class, 'store'])->name('resetPassword');
        Route::get('/usuario/nuevo', function() {
            return view('profile.usuario-new');
        })->name('nuevoUsuario');
        Route::post('/eliminar-cuenta', [RegisteredUserController::class, 'eliminarCuenta'])
        ->middleware(['eliminarCuenta'])
        ->name('eliminar_cuenta');
    });

});


// Rutas de la base de datos

Route::get('/bbdd/fill/generos', [DataBaseController::class, 'cargarGeneros']);

// Rutas del panel de administración
include __DIR__.'/admin/admin.php';
require __DIR__.'/auth.php';
