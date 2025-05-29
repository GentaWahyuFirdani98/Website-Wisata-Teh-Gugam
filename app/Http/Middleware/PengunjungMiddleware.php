<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class PengunjungMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Jika user tidak punya role "pengunjung", maka tolak akses
        if (auth()->check() && auth()->user()->role !== 'pengunjung') {
            abort(403, 'Akses ditolak: hanya untuk pengunjung.');
        }

        return $next($request);
    }
}
