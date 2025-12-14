<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckSeller
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->store) {
            if (!Auth::user()->store->is_verified) {
                abort(403, 'Toko Anda sedang menunggu verifikasi Admin.');
            }
            return $next($request);
        }
        abort(403, 'Akses untuk seller saja. Anda belum memiliki toko.');
    }
}
