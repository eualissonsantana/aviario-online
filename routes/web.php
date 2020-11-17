<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpresaCategoriaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PostCategoriaController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::redirect('/', '/login');

//Usuários
Route::get('/users', [UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::get('/users/cadastro', [UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('/users/cadastro', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/users/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/users/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');

// Empresas
Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas.index')->middleware('auth');
Route::get('/empresas/cadastro', [EmpresaController::class, 'create'])->name('empresas.create')->middleware('auth');
Route::post('/empresas/cadastro', [EmpresaController::class, 'store'])->name('empresas.store')->middleware('auth');
Route::get('/empresas/{empresa}/edit', [EmpresaController::class, 'edit'])->name('empresas.edit')->middleware('auth');
Route::put('/empresas/{empresa}', [EmpresaController::class, 'update'])->name('empresas.update')->middleware('auth');
Route::delete('/empresas/{empresa}', [EmpresaController::class, 'destroy'])->name('empresas.destroy')->middleware('auth');

// Categorias de empresa
Route::get('/empresas/categorias', [EmpresaCategoriaController::class, 'index'])->name('empresa_categorias.index')->middleware('auth');
Route::get('/empresas/categorias/cadastro', [EmpresaCategoriaController::class, 'create'])->name('empresa_categorias.create')->middleware('auth');
Route::post('/empresas/categorias/cadastro', [EmpresaCategoriaController::class, 'store'])->name('empresa_categorias.store')->middleware('auth');
Route::get('/empresas/categorias/{categoria}/edit', [EmpresaCategoriaController::class, 'edit'])->name('empresa.edit')->middleware('auth');
Route::put('/empresas/categorias/{categoria}', [EmpresaCategoriaController::class, 'update'])->name('empresa_categorias.update')->middleware('auth');
Route::delete('/empresas/categorias/{categoria}', [EmpresaCategoriaController::class, 'destroy'])->name('empresa_categorias.destroy')->middleware('auth');

// Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/categorias', [PostCategoriaController::class, 'index'])->name('posts.categorias');
Route::post('/posts/cadastro', [PostController::class, 'store'])->name('posts.cadastro')->middleware('auth');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
