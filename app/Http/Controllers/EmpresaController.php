<?php

namespace App\Http\Controllers;

use App\Models\Empresa;
use App\Models\Endereco;
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
        return view('listagem.empresas', compact('empresas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastrar.empresa');
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
            $id = $empresa->id;

            $extension = $request->imagem->extension();
            $nameFile = "{$id}.{$extension}";
            $empresa->imagem = $nameFile;

            $upload = $request->imagem->storeAs('chamadas', $nameFile);
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
    public function edit(Empresa $empresa)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Empresa $empresa)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Empresa  $empresa
     * @return \Illuminate\Http\Response
     */
    public function destroy(Empresa $empresa)
    {
        //
    }
}
