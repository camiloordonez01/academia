<?php

namespace App\Http\Middleware;

use Closure;

class RoleClienteMiddleware
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
        if ($request->user() && $request->user()->tipo != 2)
        {
            return redirect('/administrador');;
        }

        return $next($request);
    }
}
