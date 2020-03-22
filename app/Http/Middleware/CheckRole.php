<?php

namespace App\Http\Middleware;

use Closure;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if (Auth::user()->role->name === 'Súper Administrador' AND Auth::user()->role->name === 'Súper Administrador') {
            return redirect('home');
        }

        return $next($request);
    }
}
