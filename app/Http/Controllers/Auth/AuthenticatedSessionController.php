<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;

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
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();
        $request->session()->regenerate();

        $user = Auth::user();
        $role = $user->role->name ?? null;

        switch ($role) {
            case 'admin':
                return redirect()->intended('/admin/dashboard');
            case 'client':
                return redirect()->intended('/client/dashboard');
            case 'employee':
                return redirect()->intended('/employee/dashboard');
            case 'qc':
                return redirect()->intended('/qc/dashboard');
            default:
                Auth::logout();
                return redirect('/login')->withErrors([
                    'role' => 'Your account role is not recognized.',
                ]);
        }
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
