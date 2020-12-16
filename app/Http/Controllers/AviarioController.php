<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostCategoria;
use App\Models\Empresa;
use App\Models\EmpresaCategoria;
use Illuminate\Support\Facades\DB;

class AviarioController extends Controller
{
    private $ultimoPost;
    private $penultimoPost;
    private $posts;
    private $postCategoria;
    private $postCategorias;
    private $empresa;
    private $empresas;
    private $empresaCategoria;
    private $empresaCategorias;

    public function __construct()
    {
        $this->ultimoPost = Post::latest()->first();
        //dd($this->lastPost);
        $this->post = new Post();
        $this->postCategoria = new PostCategoria();
        
        Post::orderByDesc('created_at')->whereNotIn('id', [$this->ultimoPost->id])->chunk(3, function($noticias){
            $i = 0;
            foreach ($noticias as $post)
            {
                if($i == 0) {
                    $this->penultimoPost = $post;
                    $i++;
                }else {
                    $this->posts[] = $post;
                }
            }
            
            return false;
        });

        $this->postCategorias = PostCategoria::all();
    }

    public function index () {
        $posts = $this->posts;
        $categorias = $this->postCategorias;
        $ultimoPost = $this->ultimoPost;
        $penultimoPost = $this->penultimoPost;
        
        return view('aviario.home', compact('posts', 'categorias', 'ultimoPost', 'penultimoPost'));
    }

    public function hotsite()
    {
        return view('aviario.index');
    }

    

}
