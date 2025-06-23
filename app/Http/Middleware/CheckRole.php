<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Tambahkan ini

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, ...$roles)
    {
        if (!Auth::check()) {
            // Jika user belum login, redirect ke halaman login
            return redirect('login');
        }

        $user = Auth::user();

        // Periksa apakah user memiliki salah satu role yang diizinkan
        if (!in_array($user->role, $roles)) {
            // Jika tidak memiliki role yang sesuai, abort dengan 403 Forbidden
            abort(403, 'Unauthorized action.');
        }

        return $next($request);
    }
}