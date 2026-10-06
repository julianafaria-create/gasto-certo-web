<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Gasto;
use App\Models\Categoria;
use Illuminate\Http\Request;

class GastoController extends Controller
{
    public function index(Request $request)
    {
        $gastos = Gasto::with('categoria')
            ->where('user_id', $request->user()->id)
            ->get();

        return response()->json($gastos);
    }

    public function store(Request $request)
    {
        $dados = $request->validate([
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $categoria = Categoria::where('id', $dados['categoria_id'])
            ->where('user_id', $request->user()->id)
            ->first();

        if (!$categoria) {
            return response()->json([
                'message' => 'Categoria não encontrada.'
            ], 404);
        }

        $gasto = Gasto::create([
            'descricao' => $dados['descricao'],
            'valor' => $dados['valor'],
            'data' => $dados['data'],
            'categoria_id' => $dados['categoria_id'],
            'user_id' => $request->user()->id,
        ]);

        return response()->json(
            $gasto->load('categoria'),
            201
        );
    }

    public function show(Request $request, string $id)
    {
        $gasto = Gasto::with('categoria')
            ->where('user_id', $request->user()->id)
            ->find($id);

        if (!$gasto) {
            return response()->json([
                'message' => 'Gasto não encontrado.'
            ], 404);
        }

        return response()->json($gasto);
    }

    public function update(Request $request, string $id)
    {
        $gasto = Gasto::where('user_id', $request->user()->id)
            ->find($id);

        if (!$gasto) {
            return response()->json([
                'message' => 'Gasto não encontrado.'
            ], 404);
        }

        $dados = $request->validate([
            'descricao' => 'required|string|max:255',
            'valor' => 'required|numeric',
            'data' => 'required|date',
            'categoria_id' => 'required|exists:categorias,id',
        ]);

        $categoria = Categoria::where('id', $dados['categoria_id'])
            ->where('user_id', $request->user()->id)
            ->first();

        if (!$categoria) {
            return response()->json([
                'message' => 'Categoria não encontrada.'
            ], 404);
        }

        $gasto->update($dados);

        return response()->json(
            $gasto->load('categoria')
        );
    }

    public function destroy(Request $request, string $id)
    {
        $gasto = Gasto::where('user_id', $request->user()->id)
            ->find($id);

        if (!$gasto) {
            return response()->json([
                'message' => 'Gasto não encontrado.'
            ], 404);
        }

        $gasto->delete();

        return response()->json([
            'message' => 'Gasto excluído com sucesso.'
        ]);
    }
}