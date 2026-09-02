<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminPanelAccess
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (Auth::check()) {
            $user = Auth::user();
            
            // Allow access if the user is explicitly an admin OR has the admin email
            if ($user->is_admin || $user->email === 'admin@dmahesa.com') {
                return $next($request);
            }
        }

        return redirect()->route('home')->with('error', 'Akses Ditolak: Anda tidak memiliki izin untuk mengakses Panel Admin.');
    }
}
