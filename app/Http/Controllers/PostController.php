<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategoria;
use App\Models\User;
use Illuminate\Http\Request;

class PostController extends Controller
{

    private $post;
    private $posts;
    private $postCategoria;
    private $postCategorias;
    private $users;

    public function __construct()
    {
        $this->post = new Post();
        $this->postCategoria = new PostCategoria();
        $this->posts = Post::all();
        $this->postCategorias = PostCategoria::all();
        $this->users = User::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = $this->posts;
        $categorias = $this->postCategorias;
        

        return view('listagem.posts', compact('posts', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categorias = $this->postCategorias;
        $usuarios = $this->users;

        return view('cadastrar.post', compact('categorias', 'usuarios'));
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
        $post->user_id = $data['usuario_id'];
        $post->categoria_id = $data['categoria_id'];
        
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            
            if(!Post::all()->isEmpty()){
                $id = Post::latest()->first()->id + 1;
            }else {
                $id = 0;
            }

            $path = 'imagens/chamadas';
            $extension = $request->imagem->extension();
            $nameFile = "{$id}.{$extension}";
            $post->imagem = $nameFile;

            $upload = $request->imagem->storeAs($path, $nameFile);
    
        }  
        
        $post->save();

        return redirect()->route('posts.index',  ['posts' => Post::all()]);
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
    public function edit($id)
    {
        $post = $this->post->find($id);
        $categorias = $this->postCategorias;
        $usuarios = $this->users;

        return view('cadastrar.post', compact('post', 'categorias', 'usuarios'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $post = new Post();

        $post->where(['id'=>$id])->update([
            'titulo' => $data['titulo'],
            'previa' => $data['previa'],
            'conteudo' => $data['conteudo'],
            'user_id' => $data['usuario_id'],
            'categoria_id' => $data['categoria_id'],
        ]);
        
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            
            $path = 'imagens/chamadas';
            $extension = $request->imagem->extension();
            $nameFile = "{$id}.{$extension}";
            $post->where(['id'=>$id])->update([
                'imagem' => $nameFile
            ]);

            $upload = $request->imagem->storeAs($path, $nameFile);
    
        }  
        

        return redirect()->route('posts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = new Post();
        $post = $post->destroy($id);

        return($post)?"Sim":"Não";
    }

    public function search(Request $request)
    {
        $categorias = $this->postCategorias;
        
        if($request->option == 'titulo') {
            $posts = $this->post->searchTitulo($request->filter);
        }else {
            $posts = $this->post->searchCategory($request->filter);
        }
        
        return view('listagem.posts', compact('posts', 'categorias'));
        
    }

}
