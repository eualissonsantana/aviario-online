<?php

namespace App\Http\Controllers;

use App\Models\PostCategoria;
use Illuminate\Http\Request;

class PostCategoriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = PostCategoria::all();
        return view('listagem.post_categorias', compact('categorias'));
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

        $categoria = new PostCategoria();
        $categoria->descricao = $data['descricao'];
        $categoria->save();
        
        return redirect()->route('post.categorias');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PostCategoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function show(PostCategoria $categoria)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PostCategoria  $postCategoria
     * @return \Illuminate\Http\Response
     */
    public function edit(PostCategoria $categoria)
    {
        return view('editar.post_categoria', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostCategoria  $postCategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PostCategoria $categoria)
    {
        $categoria->descricao = $request->input("descricao");
        $categoria->save();
        return redirect()->route('posts.categorias');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostCategoria  $postCategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy(PostCategoria $categoria)
    {
        $categoria->delete();
    }
}
