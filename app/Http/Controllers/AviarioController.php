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
use App\Models\Voto;
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
    private $voto;

    public function __construct()
    {
        if(sizeof(Post::all()) > 0){
            $this->ultimoPost = Post::latest()->first();
            //dd($this->lastPost);
            $this->post = new Post();
            $this->postCategoria = new PostCategoria();
            $this->voto = new Voto();
            
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

            $this->empresaCategorias = db::table('empresa_categorias')
                                            ->join('empresas', 'empresas.categoria_id', '=', 'empresa_categorias.id')
                                            ->inRandomOrder()->take(8)->skip(8)
                                            ->select('empresa_categorias.*')
                                            ->get();
                                            
            $this->postCategorias = PostCategoria::all();
            $this->enquete = DB::table('enquetes')->latest()->first();
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
        $id = $enquete->id;
        $opcoes =  DB::table('opcaos')->where('enquete_id', $id)->get();
        $bannersQuadrados = $this->bannersQuadrados;
        $bannersRetangulares = $this->bannersRetangulares;

        //dd(request()->cookie());        

        
        return view('aviario.home', compact('posts', 'postsSecundarios', 'categorias', 'ultimoPost', 'penultimoPost', 'maisLidas', 'empresaCategorias', 'enquete', 'opcoes'));
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
        $voto = $this->voto;

        if (!$opcao = Opcao::find($id))
            return redirect()->back();

        $voto->token = request()->cookie('XSRF-TOKEN');
        $voto->opcao_id = $opcao->id;
        $voto->save();

        //$updateVotos = $opcao->qtd_votos + 1;

        //$opcao->where(['id'=>$id])->update([
        //    'qtd_votos' => $updateVotos
        //]);
        
        return redirect()->route('aviario.index');
    }

    public function jaVotou($cookie) 
    {
        $token = db::table('votos')->where('token', $cookie)->get();
        
        if($token)
        {
            return true;
        }else {
            return false;
        }
    }
    

}
