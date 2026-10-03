<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    // Lista somente as categorias do usuário logado
    public function index()
    {
        $categorias = Categoria::where('user_id', auth()->id())->get();

        return view('categorias.index', compact('categorias'));
    }

    // Exibe o formulário de cadastro
    public function create()
    {
        return view('categorias.create');
    }

    // Salva uma nova categoria
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
        ]);

        Categoria::create([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
            'user_id' => auth()->id(),
        ]);

        return redirect()
            ->route('categorias')
            ->with('success', 'Categoria cadastrada com sucesso!');
    }

    // Exibe o formulário de edição
    public function edit(Categoria $categoria)
    {
        if ($categoria->user_id !== auth()->id()) {
            abort(403);
        }

        return view('categorias.edit', compact('categoria'));
    }

    // Atualiza a categoria
    public function update(Request $request, Categoria $categoria)
    {
        if ($categoria->user_id !== auth()->id()) {
            abort(403);
        }

        $request->validate([
            'nome' => 'required',
            'descricao' => 'nullable',
        ]);

        $categoria->update([
            'nome' => $request->nome,
            'descricao' => $request->descricao,
        ]);

        return redirect()
            ->route('categorias')
            ->with('success', 'Categoria atualizada com sucesso!');
    }

    // Exclui a categoria
    public function destroy(Categoria $categoria)
    {
        if ($categoria->user_id !== auth()->id()) {
            abort(403);
        }

        $categoria->delete();

        return redirect()
            ->route('categorias')
            ->with('success', 'Categoria excluída com sucesso!');
    }
}