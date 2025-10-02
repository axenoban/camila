<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ClientAuthController extends Controller
{
    public function showLoginForm()
    {
        if (Auth::guard('clients')->check()) {
            return redirect()->route('client.reservations.index');
        }

        return view('client.login');
    }

    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        $remember = $request->boolean('remember');

        if (Auth::guard('clients')->attempt($credentials, $remember)) {
            $request->session()->regenerate();

            return redirect()->intended(route('client.reservations.index'))
                ->with('status', '¡Bienvenido de nuevo! Explora el catálogo y realiza tu reserva.');
        }

        return back()->withErrors([
            'email' => 'Las credenciales ingresadas no coinciden con nuestros registros.',
        ])->onlyInput('email');
    }

    public function logout(Request $request)
    {
        Auth::guard('clients')->logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('client.login')->with('status', 'Sesión cerrada correctamente.');
    }
}
