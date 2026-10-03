<?php

namespace App\Http\Controllers;

use App\Models\Gasto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    // Lista somente os gastos do usuário logado
    public function index()
    {
        $gastos = Gasto::with('categoria')
            ->where('user_id', auth()->id())
            ->get();

        return view('gastos.index', compact('gastos'));
    }

    // Exibe o formulário de cadastro
    public function create()
    {
        $categorias = Categoria::where('user_id', auth()->id())->get();

        return view('gastos.create', compact('categorias'));
    }

    // Salva um novo gasto
    public function store(Request $request)
    {
        $request->validate([
            'descricao' => 'required',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $categoria = Categoria::where('id', $request->categoria_id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        Gasto::create([
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'data' => $request->data,
            'categoria_id' => $categoria->id,
            'user_id' => auth()->id(),
        ]);

        return redirect()
            ->route('gastos')
            ->with('success', 'Gasto cadastrado com sucesso!');
    }

    // Exibe o formulário de edição
    public function edit(Gasto $gasto)
    {
        if ($gasto->user_id !== auth()->id()) {
            abort(403);
        }

        $categorias = Categoria::where('user_id', auth()->id())->get();

        return view('gastos.edit', compact('gasto', 'categorias'));
    }

    // Atualiza o gasto
    public function update(Request $request, Gasto $gasto)
    {
        if ($gasto->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'descricao' => 'required',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $categoria = Categoria::where('id', $request->categoria_id)
            ->where('user_id', auth()->id())
            ->firstOrFail();

        $gasto->update([
            'descricao' => $request->descricao,
            'valor' => $request->valor,
            'data' => $request->data,
            'categoria_id' => $categoria->id,
        ]);

        return redirect()
            ->route('gastos')
            ->with('success', 'Gasto atualizado com sucesso!');
    }

    // Exclui o gasto
    public function destroy(Gasto $gasto)
    {
        if ($gasto->user_id !== auth()->id()) {
            abort(403);
        }

        $gasto->delete();

        return redirect()
            ->route('gastos')
            ->with('success', 'Gasto excluído com sucesso!');
    }
}