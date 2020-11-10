<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::all();
        return view('listagem.posts', compact('posts'));
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

        $post = new Post();
        $post->titulo = $data['titulo'];
        $post->previa = $data['previa'];
        $post->conteudo = $data['conteudo'];
        $post->user_id = $data['user_id'];
        $post->categoria_id = $data['categoria_id'];
        
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $nome = $post->titulo;

            $extension = $request->imagem->extension();
            $nameFile = "{$nome}.{$extension}";
            $post->imagem = $nameFile;

            $upload = $request->imagem->storeAs('chamadas', $nameFile);
    
        }  
        
        $post->save();

        return redirect()->route('posts',  ['posts' => Post::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show(Post $post)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function edit(Post $post)
    {
        return view('editar.post', compact('post'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Post $post)
    {
        $data = $request->all();

        $post->titulo = $data['titulo'];
        $post->previa = $data['previa'];
        $post->conteudo = $data['conteudo'];
        $post->user_id = $data['user_id'];
        $post->categoria_id = $data['categoria_id'];
        
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $nome = $post->titulo;

            $extension = $request->imagem->extension();
            $nameFile = "{$nome}.{$extension}";
            $post->imagem = $nameFile;

            $upload = $request->imagem->storeAs('chamadas', $nameFile);
    
        }  
        
        $post->save();

        return redirect()->route('posts',  ['posts' => Post::all()]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy(Post $post)
    {
        $post->delete();
    }
}
