<?php

namespace App\Http\Middleware;

use Closure;

class RedirectNotAuthenticated
{

    public function handle($request, Closure $next) {

        if(auth()->check()) {
            return $next($request);
        }

        return redirect()->route('home');

    }
}
