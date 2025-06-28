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
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'login' => 'required|string',
            'password' => 'required|string',
        ]);
        $login_type = filter_var($request->login, FILTER_VALIDATE_EMAIL) ? 'email' : 'nis';
        $credentials = [
            $login_type => $request->login,
            'password' => $request->password,
        ];
        if (Auth::attempt($credentials, $request->boolean('remember'))) {
            // $request->authenticate();
            $request->session()->regenerate();
            return match (Auth::user()->role_id) {
                1 => redirect()->route('dashboard'),
                2 => redirect()->route('dashboard'),
                3 => redirect()->route('siswa.dashboard'),
                default => back(),
            };
        }
        return back()->withErrors([
            'login' => 'Login gagal. Periksa kembali Email/NIS dan password.',
        ]);
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
