<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\Support\Role;
use App\Providers\RouteServiceProvider;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(Request $request): RedirectResponse
    {
        $credentials = $request->validate([
            'dni' => ['required'],
            'password' => ['required'], //TODO: check for real constraints for both input values, learn about form requests too.
        ]);
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return match (Auth::user()->role_id) {
                Role::ADMIN => redirect(route(RouteServiceProvider::ADMIN_HOME)),
                Role::TEACHER => redirect(route(RouteServiceProvider::TEACHER_HOME)),
                Role::STUDENT => redirect(route(RouteServiceProvider::STUDENT_HOME))
            };
        }

        return back()->withErrors([
            'login' => 'Credenciales erroneas.',
        ])->onlyInput('dni');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
