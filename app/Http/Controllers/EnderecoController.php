<?php

namespace App\Http\Controllers;

use App\Models\Endereco;
use Illuminate\Http\Request;

class EnderecoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
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
        
        return $endereco->id;
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function show(Endereco $endereco)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function edit(Endereco $endereco)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Endereco $endereco)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Endereco  $endereco
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       //
    }
}
