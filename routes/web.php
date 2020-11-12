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

Route::get('/', function () {
    return view('welcome');
});

//Usuários
Route::get('/users', [UserController::class, 'index'])->name('users.index');
Route::get('/users/cadastro', [UserController::class, 'create'])->name('users.novo-cadastro');
Route::post('/users/cadastro/novo', [UserController::class, 'store'])->name('users.cadastro');

// Empresas
Route::get('/empresas', [EmpresaController::class, 'index'])->name('empresas');
Route::get('/empresas/categorias', [EmpresaCategoriaController::class, 'index'])->name('empresas.categorias');
Route::post('/posts/empresa', [PostController::class, 'store'])->name('post/cadastro/done');

// Posts
Route::get('/posts', [PostController::class, 'index'])->name('posts');
Route::get('/posts/categorias', [PostCategoriaController::class, 'index'])->name('posts.categorias');
Route::post('/posts/cadastro', [PostController::class, 'store'])->name('posts.cadastro');

Auth::routes(['register' => false]);

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');