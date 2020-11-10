<?php

namespace App\Http\Controllers;

use App\Models\EmpresaCategoria;
use Illuminate\Http\Request;

class EmpresaCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = EmpresaCategoria::all();
        return view('listagem.empresa_categorias', compact('categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        $categoria = new EmpresaCategoria();
        $categoria->descricao = $data['descricao'];
        $categoria->save();
        
        return redirect()->route('empresa.categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\EmpresaCategoria  $empresaCategoria
     * @return \Illuminate\Http\Response
     */
    public function show(EmpresaCategoria $empresaCategoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\EmpresaCategoria  $empresaCategoria
     * @return \Illuminate\Http\Response
     */
    public function edit(EmpresaCategoria $categoria)
    {
        return view('editar.post_categoria', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmpresaCategoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EmpresaCategoria $categoria)
    {
        $categoria->descricao = $request->input("descricao");
        $categoria->save();
        return redirect()->route('posts.categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmpresaCategoria  $empresaCategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(EmpresaCategoria $categoria)
    {
        $categoria->delete();
    }
}
