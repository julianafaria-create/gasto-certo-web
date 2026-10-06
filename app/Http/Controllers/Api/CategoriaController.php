<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Categoria;
use Illuminate\Http\Request;

class CategoriaController extends Controller
{
    public function index(Request $request)
    {
        $categorias = Categoria::where('user_id', $request->user()->id)
            ->with('gastos')
            ->get();

        return response()->json($categorias);
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $categoria = Categoria::create([
            'nome' => $dados['nome'],
            'descricao' => $dados['descricao'] ?? null,
            'user_id' => $request->user()->id,
        ]);

        return response()->json($categoria, 201);
    }

    public function show(Request $request, string $id)
    {
        $categoria = Categoria::where('user_id', $request->user()->id)
            ->with('gastos')
            ->find($id);

        if (!$categoria) {
            return response()->json([
                'message' => 'Categoria não encontrada.'
            ], 404);
        }

        return response()->json($categoria);
    }

    public function update(Request $request, string $id)
    {
        $categoria = Categoria::where('user_id', $request->user()->id)
            ->find($id);

        if (!$categoria) {
            return response()->json([
                'message' => 'Categoria não encontrada.'
            ], 404);
        }

        $dados = $request->validate([
            'nome' => 'required|string|max:255',
            'descricao' => 'nullable|string',
        ]);

        $categoria->update($dados);

        return response()->json($categoria);
    }

    public function destroy(Request $request, string $id)
    {
        $categoria = Categoria::where('user_id', $request->user()->id)
            ->find($id);

        if (!$categoria) {
            return response()->json([
                'message' => 'Categoria não encontrada.'
            ], 404);
        }

        $categoria->delete();

        return response()->json([
            'message' => 'Categoria excluída com sucesso.'
        ]);
    }
}