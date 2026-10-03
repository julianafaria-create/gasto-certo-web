<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function index()
    {
        $usuarios = User::all();

        return view('usuarios.index', compact('usuarios'));
    }

    public function create()
    {
        return view('usuarios.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
            'tipo' => 'required|in:usuario,admin',
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'tipo' => $request->tipo,
        ]);

        return redirect()
            ->route('usuarios.index')
            ->with('success', 'Usuário cadastrado com sucesso!');
    }

    public function edit(User $usuario)
    {
        return view('usuarios.edit', compact('usuario'));
    }

    public function update(Request $request, User $usuario)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $usuario->id,
            'tipo' => 'required|in:usuario,admin',
        ]);

        $usuario->update([
            'name' => $request->name,
            'email' => $request->email,
            'tipo' => $request->tipo,
        ]);

        return redirect()
            ->route('usuarios.index')
            ->with('success', 'Usuário atualizado!');
    }

    public function destroy(User $usuario)
    {
        if ($usuario->id === auth()->id()) {
            return redirect()
                ->route('usuarios.index')
                ->with('error', 'Você não pode excluir seu próprio usuário.');
        }

        $usuario->delete();

        return redirect()
            ->route('usuarios.index')
            ->with('success', 'Usuário excluído!');
    }
}