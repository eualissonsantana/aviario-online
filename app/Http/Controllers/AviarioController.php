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
            //dd($this->lastPost);
            $this->post = new Post();
            $this->postCategoria = new PostCategoria();
            $this->voto = new Voto();
            $this->enquetes = Enquete::orderByDesc('created_at')->get();
            $this->opcoes = Opcao::all();
            
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
        $id = $request->resposta;
        $enquete = $request->enquete;
        $resposta = ['validacao', 'votos', 'votou'];
        
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
            echo json_encode($resposta);
            return;
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

    public function enviaMensagem2(Request $request) {
       
        $data = $request->all();
        /*digite os destinatarios separados por virgula*/
            
        if (isset($_POST['enviarFormulario'])){


            /*** INÍCIO - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/
            
            
            $enviaFormularioParaNome = 'Nome do destinatário que receberá formulário';
            
            $enviaFormularioParaEmail = 'email-do-destinatario@dominio';
            
            
            $caixaPostalServidorNome = 'WebSite | Formulário';
            
            $caixaPostalServidorEmail = 'usuario@seudominio.com.br';
            
            $caixaPostalServidorSenha = 'senha';
            
            
            /*** FIM - DADOS A SEREM ALTERADOS DE ACORDO COM SUAS CONFIGURAÇÕES DE E-MAIL ***/
            
            
            /* abaixo as variaveis principais, que devem conter em seu formulario*/
            
            
            $remetenteNome  = $_POST['remetenteNome'];
            
            $remetenteEmail = $_POST['remetenteEmail'];
            
            $assunto  = $_POST['assunto'];
            
            $mensagem = $_POST['mensagem'];
            
            
            $mensagemConcatenada = 'Formulário gerado via website'.'<br/>';
            
            $mensagemConcatenada .= '-------------------------------<br/><br/>';
            
            $mensagemConcatenada .= 'Nome: '.$remetenteNome.'<br/>';
            
            $mensagemConcatenada .= 'E-mail: '.$remetenteEmail.'<br/>';
            
            $mensagemConcatenada .= 'Assunto: '.$assunto.'<br/>';
            
            $mensagemConcatenada .= '-------------------------------<br/><br/>';
            
            $mensagemConcatenada .= 'Mensagem: "'.$mensagem.'"<br/>';
            
            /*********************************** A PARTIR DAQUI NAO ALTERAR ************************************/
            
            
            require ('PHPMailer_5.2.4/class.phpmailer.php');
            
            
            $mail = new PHPMailer();
            
            
            $mail->IsSMTP();
            
            $mail->SMTPAuth  = true;
            
            $mail->Charset   = 'utf8_decode()';
            
            $mail->Host  = 'smtp.'.substr(strstr($caixaPostalServidorEmail, '@'), 1);
            
            $mail->Port  = '587';
            
            $mail->Username  = $caixaPostalServidorEmail;
            
            $mail->Password  = $caixaPostalServidorSenha;
            
            $mail->From  = $caixaPostalServidorEmail;
            
            $mail->FromName  = utf8_decode($caixaPostalServidorNome);
            
            $mail->IsHTML(true);
            
            $mail->Subject  = utf8_decode($assunto);
            
            $mail->Body  = utf8_decode($mensagemConcatenada);
            
            
            $mail->AddAddress($enviaFormularioParaEmail,utf8_decode($enviaFormularioParaNome));
            
            
            if(!$mail->Send()){
            
            $mensagemRetorno = 'Erro ao enviar formulário: '. print($mail->ErrorInfo);
            
            }else{
            
            $mensagemRetorno = 'Formulário enviado com sucesso!';
            
            }
            
            }
    }
    
}
