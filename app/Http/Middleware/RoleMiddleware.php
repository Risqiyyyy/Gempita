<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @param  string|array  $roles
     * @return mixed
     */
    public function handle(Request $request, Closure $next, $roles)
    {
        // Hindari infinite loop jika user diarahkan ke halaman dashboard atau spring
        if (in_array($request->path(), ['dashboard', 'spring'])) {
            return $next($request);
        }
    
        if (!Auth::check()) {
            return redirect('/spring')->withErrors('Anda harus login untuk mengakses halaman ini.');
        }
    
        $userRole = Auth::user()->role;
        $rolesArray = explode('|', $roles);
    
        if (!in_array($userRole, $rolesArray)) {
            return redirect('/dashboard')->withErrors('Anda tidak memiliki akses ke halaman ini.');
        }
    
        return $next($request);
    }
    
}
