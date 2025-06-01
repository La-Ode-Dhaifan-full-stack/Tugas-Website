<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->user()->role !== 'admin') {
            return redirect('/user/dashboard'); // redirect ke halaman user kalau bukan admin
        }

        return $next($request);
    }
}
