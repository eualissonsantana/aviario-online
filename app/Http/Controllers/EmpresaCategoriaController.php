<?php

namespace App\Http\Controllers;

use App\Models\EmpresaCategoria;
use App\Models\Ramo;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class EmpresaCategoriaController extends Controller
{

    private $ramos;
    private $categorias;
    private $categoria;

    public function __construct()
    {
        $this->ramos = Ramo::orderBy('descricao')->get();
        $this->categorias = EmpresaCategoria::orderBy('descricao')->get();
        $this->categoria = new EmpresaCategoria();
    }




    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $ramos = $this->ramos;
        $categorias = $this->categorias;
        return view('listagem.empresa_categorias', compact('ramos', 'categorias'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $ramos = $this->ramos;

        return view('cadastrar.empresa_categoria', compact('ramos'));
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

        $categoria = new EmpresaCategoria();
        $categoria->descricao = $data['descricao'];
        $categoria->slug = Str::slug($data['descricao']);
        $categoria->ramo_id = $data['ramo_id'];
        $categoria->save();
        
        return redirect()->route('empresa_categorias.index');
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
    public function edit($id)
    {
        $categoria = new EmpresaCategoria();
        $categoria = $categoria->find($id);
        $ramos = $this->ramos;

        return view('cadastrar.empresa_categoria', compact('categoria', 'ramos'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\EmpresaCategoria  $categoria
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validatedData = $request->validate([
            'descricao' => ['required', 'string', 'max:255'],
        ]);
        
        $data = $request->all();
        $categoria = new EmpresaCategoria();
        
        
        $categoria->where(['id'=>$id])->update([
            'descricao' => $data['descricao'],
            'slug' => Str::slug($data['descricao']),
            'ramo_id' => $data['ramo_id']
        ]);

        return redirect()->route('empresa_categorias.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\EmpresaCategoria  $empresaCategoria
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $categoria = new EmpresaCategoria();
        $categoria = $categoria->destroy($id);

        return($categoria)?"Sim":"Não";
    }

    
    public function search(Request $request)
    {
        $ramos = $this->ramos;
        $categorias = $this->categoria->search($request->filter);
        
        return view('listagem.empresa_categorias', compact('ramos', 'categorias'));
        
    }
}
