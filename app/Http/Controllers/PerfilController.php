<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class PerfilController extends Controller
{
    public function index()
    {
        $usuario = Auth::user();

        return view('perfil.index', compact('usuario'));
    }

    public function edit()
    {
        $usuario = Auth::user();

        return view('perfil.edit', compact('usuario'));
    }

    public function update(Request $request)
    {
        $usuario = Auth::user();

        $request->validate([
            'name' => 'required|max:255',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
        ]);

        $usuario->name = $request->name;
        $usuario->email = $request->email;

        if ($request->filled('password')) {
            $request->validate([
                'password' => 'min:6|confirmed',
            ]);

            $usuario->password = Hash::make($request->password);
        }

        $usuario->save();

        return redirect()
            ->route('perfil')
            ->with('success', 'Perfil atualizado com sucesso!');
    }
}