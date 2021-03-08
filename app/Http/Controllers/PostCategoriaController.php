<?php

namespace App\Http\Controllers;

use App\Models\PostCategoria;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class PostCategoriaController extends Controller
{

    private $categoria;
    private $categorias;

    public function __construct()
    {
        $this->categoria = new PostCategoria();
        $this->categorias = PostCategoria::paginate(15);
    }


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categorias = $this->categorias;
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
        
        $categoria = $this->categoria;
        $categoria->descricao = $data['descricao'];
        $categoria->slug = Str::slug($data['descricao']);
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
        $categoria = $this->categoria;
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
        $categoria = $this->categoria;
        
        $categoria->where(['id'=>$id])->update([
            'descricao' => $data['descricao'],
            'slug' =>  Str::slug($data['descricao'])
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
        $categoria = $this->categoria;
        $categoria = $categoria->destroy($id);

        return($categoria)?"Sim":"Não";
    }
}
