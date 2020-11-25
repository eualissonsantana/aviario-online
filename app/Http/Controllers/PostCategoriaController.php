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
        return view('cadastrar.post_categoria');
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
            'descricao' => ['required', 'string', 'max:255'],
        ]);
        
        $data = $request->all();

        $categoria = new PostCategoria();
        $categoria->descricao = $data['descricao'];
        $categoria->save();
        
        return redirect()->route('post_categorias.index');
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
    public function edit($id)
    {
        $categoria = new PostCategoria();
        $categoria = $categoria->find($id);

        return view('cadastrar.post_categoria', compact('categoria'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PostCategoria  $postCategoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'descricao' => ['required', 'string', 'max:255'],
        ]);
        
        $data = $request->all();
        $categoria = new PostCategoria();
        
        $categoria->where(['id'=>$id])->update([
            'descricao' => $data['descricao']
        ]);

        return redirect()->route('post_categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PostCategoria  $postCategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = new PostCategoria();
        $categoria = $categoria->destroy($id);

        return($categoria)?"Sim":"Não";
    }
}
