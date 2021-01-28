<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Endereco;
use App\Models\EmpresaCategoria;
use App\Models\Ramo;
use App\Models\FotoAdicional;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use App\Http\Requests\ShareFormRequest;

class EmpresaController extends Controller
{

    private $empresa;
    private $empresas;
    private $numEmpresas;
    private $ramos;
    private $categoria;
    private $endereco;
    private $categoriaEmpresa;

    public function __construct()
    {
        $this->empresa = new Empresa();
        $this->empresas = Empresa::paginate();
        $this->numEmpresas = Empresa::count();
        $this->categoria = new EmpresaCategoria();
        $this->categorias = EmpresaCategoria::all()->sortBy("descricao");
        $this->ramos = Ramo::all()->sortBy("descricao");
        $this->endereco = new Endereco();
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function cadastrarComercio(){
        $categorias = $this->categorias;

        return view('formulario', compact('categorias'));
    }

    public function index()
    {
        $empresas = $this->empresas;
        $categorias = $this->categorias;
        $ramos = $this->ramos;

        return view('listagem.empresas', compact('empresas', 'categorias', 'ramos'));
    }

    public function guia_index()
    {
       

        $ramos = db::table('ramos')
                            ->join('empresa_categorias', 'empresa_categorias.ramo_id', '=', 'ramos.id')
                            ->join('empresas', 'empresas.categoria_id', '=', 'empresa_categorias.id')
                            ->select('ramos.*')
                            ->distinct()
                            ->get();

        
        
        $categorias = db::table('empresa_categorias')
                    ->join('empresas', 'empresas.categoria_id', '=', 'empresa_categorias.id')
                    ->select('empresa_categorias.*')
                    ->get();

        $numEmpresas = $this->numEmpresas;

        return view('aviario.guia-comercial.index', compact('ramos', 'categorias', 'numEmpresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = $this->categorias;

        return view('cadastrar.empresa', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


    public function storeFormulario(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'slogan' => ['max:255'],
            'imagem' => [],
            'fotos' => ['array', 'max:4'],
            'telefone' => ['required', 'string', 'max:16', 'min:15'],
            'email' => ['max:255'],
            'youtube' => ['max:255'],
            'instagram' => ['max:255'],
            'facebook' => ['max:255'],
            'bairro' => ['string', 'max:255'],
            'logradouro' => ['max:255'],
            'complemento' => ['max:255'],
        ]); 
       
        $data = $request->all();
        
        $endereco_id = $this->createEndereco($request);

        $slug = Str::slug($data['nome']);

        $empresa = new Empresa();
        $empresa->slug = Str::slug($data['nome']);
        $empresa->nome = $data['nome'];
        $empresa->slogan = $data['slogan'];
        $empresa->descricao = $data['descricao'];
        $empresa->telefone = $data['telefone'];
        $empresa->email = $data['email'];
        $empresa->youtube = $data['youtube'];
        $empresa->instagram = $data['instagram'];
        $empresa->facebook = $data['facebook'];
        $empresa->categoria_id = $data['categoria_id'];
        $empresa->endereco_id = $endereco_id;

        if(array_key_exists("ehWhats", $data)){
            $empresa->ehWhats = $data['ehWhats'];
        }

        if(array_key_exists("aceitaBoleto", $data)){
            $empresa->aceitaBoleto = $data['aceitaBoleto'];
        }

        if(array_key_exists("aceitaCredito", $data)){
            $empresa->aceitaCredito = $data['aceitaCredito'];
        }

        if(array_key_exists("aceitaDebito", $data)){
            $empresa->aceitaDebito = $data['aceitaDebito'];
        }

        if(array_key_exists("aceitaPix", $data)){
            $empresa->aceitaPix = $data['aceitaPix'];
        }

        $empresa->save();

        $lastInsert =  DB::table('empresas')->orderBy('id','desc')->first();
        $id = $lastInsert->id;
        $this->uploadImage($request, $slug, $id);
        $this->uploadImageAdd($request, $slug, $id);    
        
        return view('cadastro-sucesso');
    }

    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'slogan' => ['max:255'],
            'imagem' => [],
            'fotos[]' => ['max:4'],
            'telefone' => ['required', 'string', 'max:16', 'min:15'],
            'email' => ['max:255'],
            'youtube' => ['max:255'],
            'instagram' => ['max:255'],
            'facebook' => ['max:255'],
            'bairro' => ['string', 'max:255'],
            'logradouro' => ['max:255'],
            'complemento' => ['max:255'],
        ]); 
       
        $data = $request->all();
        
        $endereco_id = $this->createEndereco($request);

        $slug = Str::slug($data['nome']);

        $empresa = new Empresa();
        $empresa->slug = Str::slug($data['nome']);
        $empresa->nome = $data['nome'];
        $empresa->slogan = $data['slogan'];
        $empresa->descricao = $data['descricao'];
        $empresa->telefone = $data['telefone'];
        $empresa->email = $data['email'];
        $empresa->youtube = $data['youtube'];
        $empresa->instagram = $data['instagram'];
        $empresa->facebook = $data['facebook'];
        $empresa->categoria_id = $data['categoria_id'];
        $empresa->endereco_id = $endereco_id;

        if(array_key_exists("ehWhats", $data)){
            $empresa->ehWhats = $data['ehWhats'];
        }

        if(array_key_exists("aceitaBoleto", $data)){
            $empresa->aceitaBoleto = $data['aceitaBoleto'];
        }

        if(array_key_exists("aceitaCredito", $data)){
            $empresa->aceitaCredito = $data['aceitaCredito'];
        }

        if(array_key_exists("aceitaDebito", $data)){
            $empresa->aceitaDebito = $data['aceitaDebito'];
        }

        if(array_key_exists("aceitaPix", $data)){
            $empresa->aceitaPix = $data['aceitaPix'];
        }

        $empresa->save();

        $lastInsert =  DB::table('empresas')->orderBy('id','desc')->first();
        $id = $lastInsert->id;
        $this->uploadImage($request, $slug, $id);
        $this->uploadImageAdd($request, $slug, $id);    
        return redirect()->route('empresas.index');
    }

    public function show($id) {
        
        $empresas = Empresa::orderByDesc('nome')->where('categoria_id', $id)->get();
        $categoria = EmpresaCategoria::find($id);

        return view('aviario.guia-comercial.empresas_por_categoria', [
            'empresas' => $empresas,
            'categoria' => $categoria,
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function buscaEmpresa($slug, $id)
    {   
        if (!$empresa = Empresa::find($id))
            return redirect()->back();

        $fotos = db::table('foto_adicionals')->where('empresa_id', $id)->get();
    
        return view('aviario.guia-comercial.exibe_empresa', [
            'empresa' => $empresa,
            'fotos' => $fotos
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = $this->empresa;
        $categorias = $this->categorias;
        
        $empresa = $empresa->find($id);
        
        return view('cadastrar.empresa', compact('empresa', 'categorias'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'slogan' => ['max:255'],
            'imagem' => [],
            'telefone' => ['required', 'string', 'max:16', 'min:15'],
            'email' => ['max:255'],
            'youtube' => ['max:255'],
            'instagram' => ['max:255'],
            'facebook' => ['max:255'],
            'bairro' => ['string', 'max:255'],
            'logradouro' => ['max:255'],
            'cep' => ['max:9'],
        ]); 
       
        $data = $request->all();

        $this->updateEndereco($request, $id);
        $empresa = $this->empresa;

        if(array_key_exists("ehWhats", $data)){
            $ehWhats = $data['ehWhats'];
        }else {
            $ehWhats = 0;
        }

        if(array_key_exists("aceitaBoleto", $data)){
            $aceitaBoleto = $data['aceitaBoleto'];
        }else {
            $aceitaBoleto = 0;
        }

        if(array_key_exists("aceitaCredito", $data)){
            $aceitaCredito = $data['aceitaCredito'];
        }else {
            $aceitaCredito = 0;
        }

        if(array_key_exists("aceitaDebito", $data)){
            $aceitaDebito = $data['aceitaDebito'];
        }else {
            $aceitaDebito = 0;
        }

        if(array_key_exists("aceitaPix", $data)){
            $aceitaPix = $data['aceitaPix'];
        }else {
            $aceitaPix = 0;
        }
        
        $slug = Str::slug($data['nome']);
        
        $empresa->where(['id'=>$id])->update([
            'slug' => Str::slug($data['nome']),
            'nome' => $data['nome'],
            'slogan' => $data['slogan'],
            'descricao' => $data['descricao'],
            'telefone' => $data['telefone'],
            'email' => $data['email'],
            'youtube' => $data['youtube'],
            'instagram' => $data['instagram'],
            'facebook' => $data['facebook'],
            'categoria_id' => $data['categoria_id'],
            'endereco_id' => $id,
            'ehWhats' => $ehWhats,
            'aceitaPix' => $aceitaPix,
            'aceitaDebito' => $aceitaDebito,
            'aceitaCredito' => $aceitaCredito,
            'aceitaBoleto' => $aceitaBoleto,
        ]);
            
        $this->uploadImage($request, $slug, $id);
        $this->uploadImageAdd($request, $slug, $id);    

        return redirect()->route('empresas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    
    public function destroy($id)
    {
        $empresa = $this->empresa;
        $empresa = $empresa->destroy($id);

        return($empresa)?"Sim":"Não";
    }

    public function createEndereco(Request $request)
    {
        $data = $request->all();
        
        $endereco = $this->endereco;
        $endereco->bairro = $data['bairro'];
        $endereco->logradouro = $data['logradouro'];
        $endereco->numero = $data['numero'];
        $endereco->complemento = $data['complemento'];

        if(array_key_exists("ehComercial", $data)){
            $endereco->ehComercial = $data['ehComercial'];
        }

        $endereco->save();

        return $endereco->id;
    }

    public function updateEndereco(Request $request, $id)
    {
        $data = $request->all();
        $endereco = $this->endereco;

        if(array_key_exists("ehComercial", $data)){
            $ehComercial = $data['ehComercial'];
        }else {
            $ehComercial = 0;
        }

        $endereco->where(['id'=>$id])->update([
            'bairro' => $data['bairro'],
            'logradouro' => $data['logradouro'],
            'complemento' => $data['complemento'],
            'numero' => $data['numero'],
            'ehComercial' => $ehComercial,
        ]);

        return;
    }

    public function uploadImage($request, $slug, $id)
    {
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $resize = Image::make($request->file('imagem'))->orientate()->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');


            $extension = $request->imagem->extension();
            $nameFile = "{$slug}-{$id}.{$extension}";
            $hash = md5($resize->__toString());
         
            $save = Storage::put("imagens/empresas/logomarcas/{$nameFile}", $resize->__toString());
            $empresa = $this->empresa;
            $empresa->where(['id'=>$id])->update([
                'imagem' => $nameFile,
            ]); 

            return;
        }

        return null;
    }

    public function uploadImageAdd($request, $slug, $id)
    {
        if($request->hasFile('fotos')){
            $files = $request->file('fotos');
            $cont = 1;

            foreach($files as $file){
                $resize = Image::make($file)->orientate()->resize(600, null, function ($constraint) {
                    $constraint->aspectRatio();
                })->encode('jpg');

                $extension = $file->extension();
                $nameFile = "{$slug}-{$id}-{$cont}.{$extension}";
                $hash = md5($resize->__toString());
            
                $save = Storage::put("imagens/empresas/adicionais/{$nameFile}", $resize->__toString());
                $adicional = new FotoAdicional();
                
                $adicional->nome = $nameFile;
                $adicional->empresa_id = $id;
                $adicional->save();
                $cont++;
            }

            return;
        }

        return null;
    }

    public function search(Request $request)
    {
       
        $ramos = $this->ramos;
        $categorias = $this->categorias;
        $emp = $this->empresa;
        
        if($request->option == 'nome') {
            $empresas = $emp->searchName($request->filter);
        }else {
            $empresas = $emp->searchCategory($request->filter);
        }
        
        return view('listagem.empresas', compact('empresas', 'ramos', 'categorias'));
        
    }

    public function searchAviario(Request $request)
    {
       
        $ramos = $this->ramos;
        $categoria = new EmpresaCategoria();
        $categoria = DB::table('empresa_categorias')->where('id', 1)->first();
        $emp = $this->empresa;
        
        if($request->option == 'nome') {
            $empresas = $emp->searchName($request->filter);
        }else {
            $empresas = $emp->searchCategory($request->filter);
        }
        
        return view('aviario.guia-comercial.empresas_por_categoria', compact('empresas', 'ramos', 'categoria'));
        
    }


    public function showEmpresas($slug) {

        $categoria = new EmpresaCategoria();
        $categoria = DB::table('empresa_categorias')->where('slug', $slug)->first();
        $id = $categoria->id;

        
        $empresas = Empresa::orderByDesc('nome')->where('categoria_id', $id)->get();

        return view('aviario.guia-comercial.empresas_por_categoria', [
            'empresas' => $empresas,
            'categoria' => $categoria,
        ]);
    }


    
}
