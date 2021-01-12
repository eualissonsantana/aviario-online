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
    private $postsSecundarios;
    private $postCategoria;
    private $postCategorias;
    private $maisLidas;
    private $empresa;
    private $empresas;
    private $empresaCategoria;
    private $empresaCategorias;

    public function __construct()
    {
        if(sizeof(Post::all()) > 0){
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
                    }else {
                        $this->posts[] = $post;
                    } 

                    $i++;
                }
                
                return false;
            });


            Post::orderBy('visitas')->chunk(5, function($posts){
                foreach($posts as $post)
                {
                    $this->maisLidas[] = $post;
                }
            });

            $this->empresaCategorias = EmpresaCategoria::inRandomOrder()->take(8)->skip(8)->get();
            
            $this->postCategorias = PostCategoria::all();
        }
    }

    public function index () {
        $posts = $this->posts;
        $postsSecundarios = $this->postsSecundarios;
        $categorias = $this->postCategorias;
        $ultimoPost = $this->ultimoPost;
        $penultimoPost = $this->penultimoPost;
        $maisLidas = $this->maisLidas;
        $empresaCategorias = $this->empresaCategorias;
        

        return view('aviario.home', compact('posts', 'postsSecundarios', 'categorias', 'ultimoPost', 'penultimoPost', 'maisLidas', 'empresaCategorias'));
    }

    public function hotsite()
    {
        return view('aviario.index');
    }

    

}
