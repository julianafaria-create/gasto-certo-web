<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $dados = $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        if (Auth::attempt($dados)) {
            $request->session()->regenerate();

            if (Auth::user()->tipo === 'admin') {
                return redirect()->route('admin.dashboard');
            }

            return redirect()->route('dashboard');
        }

        return back()->withErrors([
            'email' => 'E-mail ou senha incorretos.',
        ]);
    }

    public function register(Request $request)
{
    $dados = $request->validate([
        'name' => 'required|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ]);

    User::create([
        'name' => $dados['name'],
        'email' => $dados['email'],
        'password' => Hash::make($dados['password']),
        'tipo' => 'usuario',
    ]);

    return redirect()->route('login')
        ->with('success', 'Cadastro realizado com sucesso!');
}

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('login');
    }
}