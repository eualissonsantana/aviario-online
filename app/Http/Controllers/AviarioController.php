<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostCategoria;
use App\Models\Empresa;
use App\Models\EmpresaCategoria;

class AviarioController extends Controller
{
    private $lastPost;
    private $posts;
    private $postCategoria;
    private $postCategorias;
    private $empresa;
    private $empresas;
    private $empresaCategoria;
    private $empresaCategorias;

    public function __construct()
    {
        $this->lastPost = Post::first();
        $this->post = new Post();
        $this->postCategoria = new PostCategoria();
        $this->posts = Post::all();
        $this->postCategorias = PostCategoria::all();
    }

    public function index () {
        $posts = $this->posts;
        $categorias = $this->postCategorias;
        $lastPost = $this->lastPost;
        
        return view('aviario.home', compact('posts', 'categorias', 'lastPost'));
    }

}
