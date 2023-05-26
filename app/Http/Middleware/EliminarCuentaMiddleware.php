<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\Auth\RegisteredUserController;

class EliminarCuentaMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        
        //Cerrar la sesión del usuario actual
        $authController = new AuthenticatedSessionController();
        $authController->salir($request);

        //Eliminar el usuario actual
        $userController = new RegisteredUserController();
        $userController->destroy($request->cuenta_id);

        //Redirigir a la página de inicio
        return redirect('/')->with('success', 'Cuenta eliminada satisfactoriamente.');;
    }
}
