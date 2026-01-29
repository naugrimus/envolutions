<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
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
