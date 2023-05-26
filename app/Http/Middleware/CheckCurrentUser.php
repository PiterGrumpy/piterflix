<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckCurrentUser
{
    public function handle($request, Closure $next)
    {      
        
        if (Auth::check() && is_null(session()->get('current_user'))) {
            $cuenta = Auth::user();
            $usuarios = $cuenta->usuarios;
            $usuario = $usuarios[0]->id;
            session()->put('current_user', $usuario);
            if($usuarios[0]->isAdmin) {
                session()->put('isAdmin', true);
            }
        }

        return $next($request);
    }
}
