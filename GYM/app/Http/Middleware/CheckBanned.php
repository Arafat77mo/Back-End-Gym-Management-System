<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


class CheckBanned
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
        // if (auth()->check() && (auth()->user()->status == 0)){
        //     Auth::logout();
<<<<<<< HEAD

        //     $request->session()->invalidate();
        //     $request->session()->regenerateToken();
        //     return redirect()->route('login')->with('error', 'Your Account is Suspended , please contact the admin.');
        // }
=======
>>>>>>> aee70bbc41b069c598e962a9e2c260ce409bc411

        //     $request->session()->invalidate();
        //     $request->session()->regenerateToken();
        //     return redirect()->route('login')->with('error', 'Your Account is Suspended , please contact the admin.');
        // }
        
        return $next($request);
    }
}
