<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\UserController;
use App\Http\Controllers\EmpresaController;
use App\Http\Controllers\EmpresaCategoriaController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\EnqueteController;
use App\Http\Controllers\PostCategoriaController;
use App\Http\Controllers\AviarioController;
use App\Http\Controllers\BannerController;



//Usuários
Route::get('/painel/usuarios', [UserController::class, 'index'])->name('users.index')->middleware('auth');
Route::get('/painel/usuarios/cadastro', [UserController::class, 'create'])->name('users.create')->middleware('auth');
Route::post('/painel/usuarios/cadastro', [UserController::class, 'store'])->name('users.store')->middleware('auth');
Route::get('/painel/usuarios/{user}/edit', [UserController::class, 'edit'])->name('users.edit')->middleware('auth');
Route::put('/painel/usuarios/{user}', [UserController::class, 'update'])->name('users.update')->middleware('auth');
Route::delete('/painel/usuarios/{user}', [UserController::class, 'destroy'])->name('users.destroy')->middleware('auth');

// Empresas
Route::get('/painel/empresas', [EmpresaController::class, 'index'])->name('empresas.index')->middleware('auth');
Route::get('/painel/empresas/cadastro', [EmpresaController::class, 'create'])->name('empresas.create')->middleware('auth');
Route::post('/painel/empresas/cadastro', [EmpresaController::class, 'store'])->name('empresas.store')->middleware('auth');
Route::get('/painel/empresas/{empresa}/edit', [EmpresaController::class, 'edit'])->name('empresas.edit')->middleware('auth');
Route::put('/painel/empresas/{empresa}', [EmpresaController::class, 'update'])->name('empresas.update')->middleware('auth');
Route::delete('/painel/empresas/{empresa}', [EmpresaController::class, 'destroy'])->name('empresas.destroy')->middleware('auth');
Route::any('/painel/empresas/buscar', [EmpresaController::class, 'search'])->name('empresas.search');
Route::any('painel/empresas/busca/{slug}', [EmpresaController::class, 'searchCategoria'])->name('empresas.busca');

// Categorias de empresa
Route::get('/painel/empresas/categorias/', [EmpresaCategoriaController::class, 'index'])->name('empresa_categorias.index')->middleware('auth');
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

// Banners
Route::get('/painel/banners', [BannerController::class, 'index'])->name('banners.index')->middleware('auth');
Route::get('/painel/banners/cadastro', [BannerController::class, 'create'])->name('banners.create')->middleware('auth');
Route::post('/painel/banners/cadastro', [BannerController::class, 'store'])->name('banners.store')->middleware('auth');
Route::get('/painel/banners/{banner}/edit', [BannerController::class, 'edit'])->name('banners.edit')->middleware('auth');
Route::put('/painel/banners/{banner}', [BannerController::class, 'update'])->name('banners.update')->middleware('auth');
Route::delete('/painel/banners/{banner}', [BannerController::class, 'destroy'])->name('banners.destroy')->middleware('auth');

// Enquetes
Route::get('/painel/enquetes', [EnqueteController::class, 'index'])->name('enquetes.index')->middleware('auth');
Route::get('/painel/enquetes/cadastro', [EnqueteController::class, 'create'])->name('enquetes.create')->middleware('auth');
Route::post('/painel/enquetes/cadastro', [EnqueteController::class, 'store'])->name('enquetes.store')->middleware('auth');
Route::get('/painel/enquetes/{enquete}/edit', [EnqueteController::class, 'edit'])->name('enquetes.edit')->middleware('auth');
Route::put('/painel/enquetes/{enquete}', [EnqueteController::class, 'update'])->name('enquetes.update')->middleware('auth');
Route::delete('/painel/enquetes/{enquete}', [EnqueteController::class, 'destroy'])->name('enquetes.destroy')->middleware('auth');
Route::any('/painel/enquetes/buscar', [EnqueteController::class, 'search'])->name('enquetes.search');
Route::post('/painel/enquetes/encerra', [EnqueteController::class, 'encerraEnquete'])->name('enquete.encerra')->middleware('auth');




// Rotas comuns

Route::get('/', [AviarioController::class, 'hotsite'])->name('aviario.hotsite');
Route::get('/home', [AviarioController::class, 'index'])->name('aviario.index');
Route::get('/contato', [AviarioController::class, 'contato'])->name('aviario.contato');
Route::post('/contato', [AviarioController::class, 'enviaMensagem'])->name('aviario.mensagem');
Route::get('/enquetes', [AviarioController::class, 'indexEnquetes'])->name('aviario.enquetes');
Route::post('/responde-enquete', [AviarioController::class, 'registraResposta'])->name('aviario.enquetes.respostas');
Route::get('/enquetes/{id}', [AviarioController::class, 'showEnquete'])->name('enquetes.show');

Route::get('/noticias', [PostController::class, 'lista_posts'])->name('posts.lista');
Route::get('/noticias/{slug}/{id}', [PostController::class, 'show'])->name('posts.show');
Route::any('/noticias/buscar', [PostController::class, 'searchAviario'])->name('aviario.posts.search');
Route::get('/noticias/{slug}', [PostController::class, 'showNoticias'])->name('posts.categoria');


Route::get('/guia-comercial', [EmpresaController::class, 'guia_index'])->name('guia.index');
Route::get('/guia-comercial/{slug}', [EmpresaController::class, 'showEmpresas'])->name('guia.categoria');
Route::get('/guia-comercial/mostrar/{slug}/{id}', [EmpresaController::class, 'buscaEmpresa'])->name('empresas.show');
Route::any('/guia-comercial/busca', [EmpresaController::class, 'searchAviario'])->name('aviario.empresas.search');



Route::get('/painel', [App\Http\Controllers\HomeController::class, 'index'])->name('painel')->middleware('auth');
Route::get('/cadastrar', [App\Http\Controllers\EmpresaController::class, 'cadastrarComercio'])->name('cadastrar-comercio');
Route::post('/cadastrar/enviado', [EmpresaController::class, 'storeFormulario'])->name('empresas.cadastrar-comercio');



Auth::routes(['register' => false]);