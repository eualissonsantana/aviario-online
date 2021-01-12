<?php

namespace App\Http\Controllers;

use App\Models\Post;
use App\Models\PostCategoria;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;


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
        $this->posts = Post::all()->sortByDesc('created_at');
        $this->postCategorias = PostCategoria::all()->sortBy("descricao");
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

    public function lista_posts()
    {
        $posts = $this->posts;
        $categorias = $this->postCategorias;

        return view('aviario.noticias.lista_noticias', compact('posts', 'categorias'));
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
        $slug = Str::slug($data['titulo']);

        $post = $this->post;
        $post->slug = Str::slug($data['titulo']);
        $post->titulo = $data['titulo'];
        $post->previa = $data['previa'];
        $post->conteudo = $data['conteudo'];
        $post->user_id = $data['usuario_id'];
        $post->categoria_id = $data['categoria_id'];
        $post->visitas = 0;
        
        $post->save();
        
        $lastInsert =  DB::table('posts')->orderBy('id','desc')->first();
        $id = $lastInsert->id;
        $this->uploadImage($request, $slug, $id);

        return redirect()->route('posts.index',  ['posts' => Post::all()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Post  $post
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $id)
    {
        if (!$post = Post::find($id))
            return redirect()->back();
        
        return view('aviario.noticias.exibe_noticia', [
            'post' => $post
        ]);
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
        $post = $this->post;

        $slug = Str::slug($data['titulo']);
        
        $post->where(['id'=>$id])->update([
            'slug' => Str::slug($data['titulo']),
            'titulo' => $data['titulo'],
            'previa' => $data['previa'],
            'conteudo' => $data['conteudo'],
            'user_id' => $data['usuario_id'],
            'categoria_id' => $data['categoria_id'],
            ]); 
        
        $this->uploadImage($request, $slug, $id);

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
        $post = $this->post;
        $post = $post->destroy($id);

        return($post)?"Sim":"Não";
    }

    public function uploadImage($request, $slug, $id)
    {
        if($request->hasFile('imagem') && $request->file('imagem')->isValid()) {
            $resize = Image::make($request->file('imagem'))->resize(600, null, function ($constraint) {
                $constraint->aspectRatio();
            })->encode('jpg');

            $extension = $request->imagem->extension();
            $nameFile = "{$slug}-{$id}.{$extension}";
            $hash = md5($resize->__toString());
         
            $save = Storage::put("imagens/chamadas/{$nameFile}", $resize->__toString());
            $post = $this->post;
            $post->where(['id'=>$id])->update([
                'imagem' => $nameFile,
            ]); 

            return;
        }

        return null;
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

    public function searchAviario(Request $request)
    {
        $categorias = $this->postCategorias;
        
        if($request->option == 'titulo') {
            $posts = $this->post->searchTitulo($request->filter);
        }else {
            $posts = $this->post->searchCategory($request->filter);
        }

        
        return view('aviario.noticias.lista_noticias', compact('posts', 'categorias'));
        
    }

}
