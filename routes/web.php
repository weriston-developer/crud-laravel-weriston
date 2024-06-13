<?php

use App\Http\Controllers\ProductController;
use App\Models\Product;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

// Rota para listar produtos
Route::get('/lista-produtos', [ProductController::class, 'index'])->name('produtos.index');

// Rota para mostrar o formulário de criação de produto
Route::get('/produtos/create', [ProductController::class, 'create'])->name('produtos.create');

// Rota para salvar o novo produto
Route::post('/produtos', [ProductController::class, 'store'])->name('produtos.store');

// Rota para mostrar o formulário de edição de produto
Route::get('/produtos/{id}/edit', [ProductController::class, 'edit'])->name('produtos.edit');

// Rota para atualizar um produto existente
Route::put('/produtos/{id}', [ProductController::class, 'update'])->name('produtos.update');

Route::delete('/produtos/{id}', [ProductController::class, 'destroy'])->name('produtos.destroy');
