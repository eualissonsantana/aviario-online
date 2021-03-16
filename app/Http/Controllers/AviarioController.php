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
use Illuminate\Support\Facades\Mail;
use App\Mail\sendMail;


class AviarioController extends Controller
{
    private $ultimoPost;
    private $quartoPost;
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
    private $enquetes;
    private $opcoes;
    private $bannersQuadrados;
    private $bannersRetangulares;
    private $opcoesEnquete;
    private $voto;

    public function __construct()
    {
        if(sizeof(Post::all()) > 0){
            $this->ultimoPost = Post::latest()->first();
            $this->post = new Post();
            $this->postCategoria = new PostCategoria();
            $this->voto = new Voto();
            $this->enquetes = Enquete::orderByDesc('created_at')->get();
            $this->opcoes = Opcao::all();
            
            Post::orderByDesc('created_at')->whereNotIn('id', [$this->ultimoPost->id])->chunk(3, function($noticias){
                $i = 0;
                foreach ($noticias as $post)
                {
                    if($i < 2) {
                        $this->posts[] = $post;
                    }else {
                        $this->quartoPost = $post;
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
                                            ->distinct()
                                            ->get();
                                            
            $this->postCategorias = PostCategoria::all();
            $this->enquete = DB::table('enquetes')->where('aberta', 1)->latest()->first();
            $this->bannersQuadrados = Banner::where('posicao', 'lado')->where('ativo', '1')->get();
            $this->bannersRetangulares = Banner::where('posicao', 'topo')->where('ativo', '1')->get();
        }
    }

    public function index () {
        $posts = $this->posts;
        $postsSecundarios = $this->postsSecundarios;
        $categorias = $this->postCategorias;
        $ultimoPost = $this->ultimoPost;
        $quartoPost = $this->quartoPost;
        $maisLidas = $this->maisLidas;
        $empresaCategorias = $this->empresaCategorias;
        
        if(isset($this->enquete)){
            $enquete = $this->enquete;
            $id = $enquete->id;
            $opcoes =  DB::table('opcaos')->where('enquete_id', $id)->get();
        }else {
            $enquete = null;
            $opcoes = null;
        }

        $bannersQuadrados = $this->bannersQuadrados;
        $bannersRetangulares = $this->bannersRetangulares;      

        return view('aviario.home', compact('posts', 'postsSecundarios', 'categorias', 'ultimoPost', 'quartoPost', 'maisLidas', 'empresaCategorias', 'enquete', 'opcoes'));
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
        $id = $request->resposta;
        $enquete = $request->enquete;
        $resposta = ['validacao', 'votos', 'votou', 'opcoes', 'totalVotos'];

        
        setcookie('enquete-'.$enquete, $enquete, (time() + (3600 * 24 * 30 * 12 * 5)));
        $resposta['votou'] = true;
        
        if (!$opcao = Opcao::find($id)){
            $resposta['validacao'] = false;
            echo json_encode($resposta);
            return;
        } else {
            $updateVotos = $opcao->qtd_votos + 1;
    
            $opcao->where(['id'=>$id])->update([
                'qtd_votos' => $updateVotos
            ]);

          
            $resposta['validacao'] = true;
            $resposta['votos'] = $updateVotos;
            

            $enquete = $this->enquete;
            $id = $enquete->id;
            $resposta['opcoes'] =  DB::table('opcaos')->where('enquete_id', $id)->get();
            $resposta['totalVotos'] = DB::table('opcaos')->where('enquete_id', $id)->sum('qtd_votos');
            
            echo json_encode($resposta);
            //echo json_encode($opcoes);

            return ;
        }



        //return back()
          //  ->with('success', 'Obrigado pela participação!');
        
    }

    public function indexEnquetes() {
        $enquetes = $this->enquetes;
        $opcoes = $this->opcoes;

        return view('aviario.enquetes.index', [
            'enquetes' => $enquetes, 
            'opcoes' => $opcoes
        ]);
    }

    public function enviaMensagem(Request $request) {
        $validatedData = $request->validate([
            'nome' => 'required',
            'email' => 'required',
            'telefone' => [],
            'mensagem' => 'required',
        ]); 

    
        $data = $request->all();
        
        Mail::to(config('mail.from.address'))
            ->send(new sendMail($data));

        return back()
            ->with('success', 'Sua Mensagem foi enviada com sucesso!');

    }

    
    
}
