<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\GastoController;
use App\Http\Controllers\PerfilController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;

/*
Rotas de autenticação
*/

Route::get('/', function () {
    return view('auth.login');
})->name('login');

Route::get('/cadastro', function () {
    return view('auth.cadastro');
})->name('cadastro');

Route::post('/login', [AuthController::class, 'login'])
    ->name('login.processar');

Route::post('/logout', [AuthController::class, 'logout'])
    ->name('logout');

/*
Dashboard
*/

Route::get('/dashboard', [DashboardController::class, 'index'])
    ->name('dashboard');

/*
CRUD de Gastos
*/

Route::get('/gastos', [GastoController::class, 'index'])
    ->name('gastos');

Route::get('/gastos/novo', [GastoController::class, 'create'])
    ->name('gastos.create');

Route::post('/gastos', [GastoController::class, 'store'])
    ->name('gastos.store');

Route::get('/gastos/{gasto}/editar', [GastoController::class, 'edit'])
    ->name('gastos.edit');

Route::put('/gastos/{gasto}', [GastoController::class, 'update'])
    ->name('gastos.update');

Route::delete('/gastos/{gasto}', [GastoController::class, 'destroy'])
    ->name('gastos.destroy');

/*
CRUD de Categorias
*/

Route::get('/categorias', [CategoriaController::class, 'index'])
    ->name('categorias');

Route::get('/categorias/nova', [CategoriaController::class, 'create'])
    ->name('categorias.create');

Route::post('/categorias', [CategoriaController::class, 'store'])
    ->name('categorias.store');

Route::get('/categorias/{categoria}/editar', [CategoriaController::class, 'edit'])
    ->name('categorias.edit');

Route::put('/categorias/{categoria}', [CategoriaController::class, 'update'])
    ->name('categorias.update');

Route::delete('/categorias/{categoria}', [CategoriaController::class, 'destroy'])
    ->name('categorias.destroy');

Route::post('/cadastro', [AuthController::class, 'register'])
    ->name('cadastro.processar');

/*
Perfil
*/

Route::get('/perfil', [PerfilController::class, 'index'])
    ->name('perfil');

Route::get('/perfil/editar', [PerfilController::class, 'edit'])
    ->name('perfil.edit');

Route::put('/perfil', [PerfilController::class, 'update'])
    ->name('perfil.update');
/*
Painel Administrativo
*/
Route::middleware('admin')->group(function () {

    Route::get('/admin', [AdminController::class, 'index'])
        ->name('admin.dashboard');

/*
CRUD de Usuários
*/

    Route::get('/usuarios', [UserController::class, 'index'])
        ->name('usuarios.index');

    Route::get('/usuarios/novo', [UserController::class, 'create'])
        ->name('usuarios.create');

    Route::post('/usuarios', [UserController::class, 'store'])
        ->name('usuarios.store');

    Route::get('/usuarios/{usuario}/editar', [UserController::class, 'edit'])
        ->name('usuarios.edit');

    Route::put('/usuarios/{usuario}', [UserController::class, 'update'])
        ->name('usuarios.update');

    Route::delete('/usuarios/{usuario}', [UserController::class, 'destroy'])
        ->name('usuarios.destroy');

});