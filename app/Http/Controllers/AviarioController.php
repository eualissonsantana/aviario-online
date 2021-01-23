<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\PostCategoria;
use App\Models\Empresa;
use App\Models\EmpresaCategoria;
use App\Models\Enquete;
use App\Models\Opcao;
use App\Models\Banner;
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
    private $enquete;
    private $bannersQuadrados;
    private $bannersRetangulares;
    private $opcoesEnquete;

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
            $this->enquete = DB::table('enquetes')->inRandomOrder()->first();
            $this->bannersQuadrados = Banner::where('posicao', 'lado')->where('ativo', '1')->get();
            $this->bannersRetangulares = Banner::where('posicao', 'topo')->where('ativo', '1')->get();
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
        $enquete = $this->enquete;
        $opcoes =  DB::table('opcaos')->where('enquete_id', 10)->get();
        $bannersQuadrados = $this->bannersQuadrados;
        $bannersRetangulares = $this->bannersRetangulares;

        
        return view('aviario.home', compact('posts', 'postsSecundarios', 'categorias', 'ultimoPost', 'penultimoPost', 'maisLidas', 'empresaCategorias', 'enquete', 'opcoes', 'bannersQuadrados', 'bannersRetangulares'));
    }

    public function hotsite()
    {
        return view('aviario.index');
    }

    public function contato()
    {
        return view('aviario.contato.contato');
    }

    public function registraResposta(Request $request) 
    {
        $data = $request->all();
        $id = $data['resposta'];

        if (!$opcao = Opcao::find($id))
            return redirect()->back();

        $updateVotos = $opcao->qtd_votos + 1;

        $opcao->where(['id'=>$id])->update([
            'qtd_votos' => $updateVotos
        ]);
        
        return $this->index();
    }

    

}
