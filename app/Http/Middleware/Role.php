<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Role
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $allow = array_slice(func_get_args(), 2); // Cek role yang diperbolehkan

        if (\Auth::user()) { // Jika user login
            $ada = \Auth::user()->hasRole()->value('role');
            if ($ada) {
                $role = $ada;
            } else {
                $role = 'user';
            }

            foreach ($allow as $allowedRole) {  // Untuk setiap role yang diperbolehkan
                if ($role == $allowedRole) {
                    return $next($request);
                }
            }
            return redirect('/dashboard');
        } else {
            return redirect('/');
        }
    }
}