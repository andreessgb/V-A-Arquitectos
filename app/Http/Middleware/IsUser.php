<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        // Verificamos si el usuario autenticado tiene el rol 'admin'
        $user = auth()->user();

        if (!$user || !$user->roles->contains('name', 'user')) {
            // Si no tiene el rol de admin, redirigimos al inicio o a una página de error
            return redirect('/')->with('error', 'No tienes acceso a esta página.');
        }

        return $next($request);
    }
}
