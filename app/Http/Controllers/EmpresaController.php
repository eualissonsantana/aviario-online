<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Endereco;
use App\Models\EmpresaCategoria;
use Illuminate\Http\Request;

class EmpresaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $empresas = Empresa::all();
        $categorias = EmpresaCategoria::all();

        return view('listagem.empresas', compact('empresas', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = EmpresaCategoria::all();

        return view('cadastrar.empresa', compact('categorias'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'nome' => ['required', 'string', 'max:255'],
            'slogan' => ['max:255'],
            'imagem' => [],
            'telefone' => ['required', 'string', 'max:14'],
            'email' => ['max:255'],
            'youtube' => ['max:255'],
            'instagram' => ['max:255'],
            'facebook' => ['max:255'],
            'bairro' => ['string', 'max:255'],
            'rua' => ['max:255'],
            'cep' => ['max:9'],
            'cidade' => ['max:255'],
            'estado' => ['max:2']
        ]); 
       
        $data = $request->all();
        
        $endereco = new Endereco();
        $endereco->bairro = $data['bairro'];
        $endereco->rua = $data['rua'];
        $endereco->cep = $data['cep'];
        $endereco->numero = $data['numero'];
        $endereco->cidade = $data['cidade'];
        $endereco->estado = $data['estado'];

        if(array_key_exists("ehComercial", $data)){
            $endereco->ehComercial = $data['ehComercial'];
        }

        $endereco->save();

        $empresa = new Empresa();
        $empresa->nome = $data['nome'];
        $empresa->slogan = $data['slogan'];
        $empresa->descricao = $data['descricao'];
        $empresa->telefone = $data['telefone'];
        $empresa->email = $data['email'];
        $empresa->youtube = $data['youtube'];
        $empresa->instagram = $data['instagram'];
        $empresa->facebook = $data['facebook'];
        $empresa->categoria_id = $data['categoria_id'];
        $empresa->endereco_id = $endereco->id;

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

        if(array_key_exists("aceitaDinheiro", $data)){
            $empresa->aceitaDinheiro = $data['aceitaDinheiro'];
        }

        if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            if(!Empresa::all()->isEmpty()){
                $id = Empresa::latest()->first()->id + 1;
            }else {
                $id = 0;
            }

            $path = 'imagens/empresas';
            $extension = $request->imagem->extension();
            $nameFile = "{$id}.{$extension}";
            $empresa->imagem = $nameFile;

            $upload = $request->imagem->storeAs($path, $nameFile);
        }  

        $empresa->save();
        
        return redirect()->route('empresas.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function show(Empresa $empresa)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $empresa = new Empresa();
        $categorias = EmpresaCategoria::all();
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
            'telefone' => ['required', 'string', 'max:14'],
            'email' => ['max:255'],
            'youtube' => ['max:255'],
            'instagram' => ['max:255'],
            'facebook' => ['max:255'],
            'bairro' => ['string', 'max:255'],
            'rua' => ['max:255'],
            'cep' => ['max:9'],
            'cidade' => ['max:255'],
            'estado' => ['max:2']
        ]); 
       
        $data = $request->all();

        $empresa = new Empresa();
        $endereco = new Endereco();

        
        if(array_key_exists("ehComercial", $data)){
            $ehComercial = $data['ehComercial'];
        }else {
            $ehComercial = 0;
        }

        $endereco->where(['id'=>$id])->update([
            'bairro' => $data['bairro'],
            'rua' => $data['rua'],
            'cep' => $data['cep'],
            'numero' => $data['numero'],
            'cidade' => $data['cidade'],
            'estado' => $data['estado'],
            'ehComercial' => $ehComercial,
        ]);

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

        if(array_key_exists("aceitaDinheiro", $data)){
            $aceitaDinheiro = $data['aceitaDinheiro'];
        }else {
            $aceitaDinheiro = 0;
        }

        $empresa->where(['id'=>$id])->update([
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
            'aceitaDinheiro' => $aceitaDinheiro,
            'aceitaDebito' => $aceitaDebito,
            'aceitaCredito' => $aceitaCredito,
            'aceitaBoleto' => $aceitaBoleto,
        ]);

        
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {

            $path = 'imagens/empresas';
            $extension = $request->imagem->extension();
            $nameFile = "{$id}.{$extension}";
            $empresa->where(['id'=>$id])->update([
                'imagem' => $nameFile
            ]);

            $upload = $request->imagem->storeAs($path, $nameFile);

            if(!$upload) {
                return redirect()
                            ->back()
                            ->with('error', 'Falha ao fazer upload de imagem');
            }
        }  
        
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
        $empresa = new Empresa();
        $empresa = $empresa->destroy($id);

        return($empresa)?"Sim":"Não";
    }

    public function search(Request $request)
    {
        $categorias = EmpresaCategoria::all();
        $emp = new Empresa();
        
        if($request->option == 'nome') {
            $empresas = $emp->searchName($request->filter);
        }else {
            $empresas = $emp->searchCategory($request->filter);
        }
        
        return view('listagem.empresas', compact('empresas', 'categorias'));
        
    }
    
}
