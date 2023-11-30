<?php

namespace App\Http\Middleware;

use App\Models\Support\Role;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                return match (Auth::user()->role_id) {
                    Role::ADMIN => redirect(route(RouteServiceProvider::ADMIN_HOME)),
                    Role::TEACHER => redirect(route(RouteServiceProvider::TEACHER_HOME)),
                    Role::STUDENT => redirect(route(RouteServiceProvider::STUDENT_HOME))
                };
            }
        }

        return $next($request);
    }
}
