<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\Usuario;

class AdminAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $current_userID = request()->session()->get('current_user');
        $current_user = Usuario::find($current_userID);
        if ($request->user() && $current_user->isAdmin != true || is_null($current_user->isAdmin)) {
            return redirect('/');
        }
    
        return $next($request);
    }
}
