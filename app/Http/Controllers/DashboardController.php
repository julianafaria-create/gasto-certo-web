<?php

namespace App\Http\Controllers;

use App\Models\Categoria;
use App\Models\Gasto;

class DashboardController extends Controller
{
    public function index()
    {
        $userId = auth()->id();

        $totalCategorias = Categoria::where('user_id', $userId)->count();

        $totalGastos = Gasto::where('user_id', $userId)->count();

        $valorTotal = Gasto::where('user_id', $userId)->sum('valor');

        $ultimosGastos = Gasto::with('categoria')
            ->where('user_id', $userId)
            ->latest()
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalCategorias',
            'totalGastos',
            'valorTotal',
            'ultimosGastos'
        ));
    }
}