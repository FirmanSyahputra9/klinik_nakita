<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

class CheckRouteExists
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next)
    {
        $routeName = $request->route()->getName();

        if (!Route::has($routeName)) {
            return redirect()->route('error.404');
        }

        return $next($request);
    }
}
