<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class CORS
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next) {
        header('Acess-Control-Allow-Origin: *');
        header('Acess-Control-Allow-Origin: Content-type, X-Auth-Token, Authorization, Origin');
        Header ( "Access-Control-Allow-Methods:GET,POST,OPTIONS,DELETE,PUT");

        return $next($request);
    }
}
