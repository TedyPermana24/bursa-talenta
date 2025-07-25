<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ProviderMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!auth()->check()) {
            return redirect()->route('login');
        }

        // Cek apakah user memiliki role provider
        // Asumsi: user memiliki field 'role' atau relasi role
        if (auth()->user()->role !== 'provider') {
            abort(403, 'Unauthorized. Provider access only.');
        }

        return $next($request);
    }
}
