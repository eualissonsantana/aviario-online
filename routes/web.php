<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpresaCategoriaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCategoriaController;
use App\Http\Controllers\AviarioController;



//Usuários
Route::get('/painel/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::get('/painel/users/cadastro', [UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('/painel/users/cadastro', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/painel/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/painel/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/painel/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');

// Empresas
Route::get('/painel/empresas', [EmpresaController::class, 'index'])->name('empresas.index')->middleware('auth');
Route::get('/painel/empresas/cadastro', [EmpresaController::class, 'create'])->name('empresas.create')->middleware('auth');
Route::post('/painel/empresas/cadastro', [EmpresaController::class, 'store'])->name('empresas.store')->middleware('auth');
Route::get('/painel/empresas/{empresa}/edit', [EmpresaController::class, 'edit'])->name('empresas.edit')->middleware('auth');
Route::put('/painel/empresas/{empresa}', [EmpresaController::class, 'update'])->name('empresas.update')->middleware('auth');
Route::delete('/painel/empresas/{empresa}', [EmpresaController::class, 'destroy'])->name('empresas.destroy')->middleware('auth');
Route::any('/painel/empresas/buscar', [EmpresaController::class, 'search'])->name('empresas.search');

// Categorias de empresa
Route::get('/painel/empresas/categorias', [EmpresaCategoriaController::class, 'index'])->name('empresa_categorias.index')->middleware('auth');
Route::get('/painel/empresas/categorias/cadastro', [EmpresaCategoriaController::class, 'create'])->name('empresa_categorias.create')->middleware('auth');
Route::post('/painel/empresas/categorias/cadastro', [EmpresaCategoriaController::class, 'store'])->name('empresa_categorias.store')->middleware('auth');
Route::get('/painel/empresas/categorias/{categoria}/edit', [EmpresaCategoriaController::class, 'edit'])->name('empresa.edit')->middleware('auth');
Route::put('/painel/empresas/categorias/{categoria}', [EmpresaCategoriaController::class, 'update'])->name('empresa_categorias.update')->middleware('auth');
Route::delete('/painel/empresas/categorias/{categoria}', [EmpresaCategoriaController::class, 'destroy'])->name('empresa_categorias.destroy')->middleware('auth');

// Posts
Route::get('/painel/noticias', [PostController::class, 'index'])->name('posts.index')->middleware('auth');
Route::get('/painel/noticias/cadastro', [PostController::class, 'create'])->name('posts.create')->middleware('auth');
Route::post('/painel/noticias/cadastro', [PostController::class, 'store'])->name('posts.store')->middleware('auth');
Route::get('/painel/noticias/{noticia}/edit', [PostController::class, 'edit'])->name('posts.edit')->middleware('auth');
Route::put('/painel/noticias/{noticia}', [PostController::class, 'update'])->name('posts.update')->middleware('auth');
Route::delete('/painel/noticias/{noticia}', [PostController::class, 'destroy'])->name('posts.destroy')->middleware('auth');
Route::any('/painel/noticias/buscar', [PostController::class, 'search'])->name('posts.search');

// Categorias de post
Route::get('/painel/noticias/categorias', [PostCategoriaController::class, 'index'])->name('post_categorias.index')->middleware('auth');
Route::get('/painel/noticias/categorias/cadastro', [PostCategoriaController::class, 'create'])->name('post_categorias.create')->middleware('auth');
Route::post('/painel/noticias/categorias/cadastro', [PostCategoriaController::class, 'store'])->name('post_categorias.store')->middleware('auth');
Route::get('/painel/noticias/categorias/{categoria}/edit', [PostCategoriaController::class, 'edit'])->name('post_categorias.edit')->middleware('auth');
Route::put('/painel/noticias/categorias/{categoria}', [PostCategoriaController::class, 'update'])->name('post_categorias.update')->middleware('auth');
Route::delete('/painel/noticias/categorias/{categoria}', [PostCategoriaController::class, 'destroy'])->name('post_categorias.destroy')->middleware('auth');
Route::any('/painel/empresas/categorias/buscar-por-ramo', [EmpresaCategoriaController::class, 'search'])->name('ramos.search');


// Rotas comuns

Route::get('/', [AviarioController::class, 'index'])->name('aviario.index');


Route::get('/painel', [App\Http\Controllers\HomeController::class, 'index'])->name('painel')->middleware('auth');


Auth::routes(['register' => false]);