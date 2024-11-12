<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Autentificador
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (dd($request->header("Autorization") !== "123")) {
            return response("mal", 401);
        }
        // dd($request->header("Autorization")); // var_dump($request); die;
        return $next($request);
    }
}
