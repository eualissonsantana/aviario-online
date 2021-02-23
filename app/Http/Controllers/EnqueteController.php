<?php

namespace App\Http\Controllers;

use App\Models\Enquete;
use App\Models\Opcao;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Intervention\Image\Size;

class EnqueteController extends Controller
{

    private $enquete;
    private $enquetes;
    private $opcao;
    private $opcoes;

    public function __construct()
    {
        $this->enquete = new Enquete();
        $this->opcao = new Opcao();
        $this->enquetes = Enquete::all()->sortByDesc('created_at');
        $this->opcoes = Opcao::all();
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $enquetes = $this->enquetes;
        $opcoes = $this->opcoes;

        return view('listagem.enquetes', compact('enquetes', 'opcoes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('cadastrar.enquete');
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
        $slug = Str::slug($data['pergunta']);

        $enquete = $this->enquete;

        $enquete->slug = $slug;
        $enquete->pergunta = $data['pergunta'];
        $enquete->usuario_id = 1;
        $enquete->save();
        

        $lastInsert =  DB::table('enquetes')->orderBy('id','desc')->first();
        $id = $lastInsert->id;

        foreach($data['opcao'] as $resposta)
        {
            if($resposta != null) {
                $opcao = new Opcao();
                $opcao->descricao = $resposta;
                $opcao->enquete_id = $id;
                $opcao->qtd_votos = 0;
                $opcao->save();
            }
        }

        $enquetes = Enquete::all();
        
        foreach($enquetes as $enq) {
            if($enq->id != $enquete->id){
                $enq->where(['id'=>$enq->id])->update([
                    'aberta' => 0,
                ]);
            }
        }

        return redirect()->route('enquetes.index', [
            'enquetes' => $this->enquetes
        ]);

    }


    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Enquete  $enquete
     * @return \Illuminate\Http\Response
     */
    public function show($slug, $id)
    {
        if (!$enquete = Enquete::find($id))
            return redirect()->back();

        $opcoes = db::table('opcaos')->where('enquete_id', $id)->get();
        
        return view('aviario.noticias.exibe_noticia', [
            'enquete' => $enquete,
            'opcoes' => $opcoes
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Enquete  $enquete
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $enquete = $this->enquete;
        
        $enquete = $enquete->find($id);
        $opcoes = Opcao::where('enquete_id', $id)->get();
        
        return view('cadastrar.enquete', compact('enquete', 'opcoes'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Enquete  $enquete
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $data = $request->all();

        $enquete = $this->enquete;

        $enquete->where(['id'=>$id])->update([
            'pergunta' => $data['pergunta'],
        ]);


        return redirect()->route('enquetes.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Enquete  $enquete
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $enquete = $this->enquete;
        $opcoes = Opcao::where('enquete_id', $id)->get();

        foreach($opcoes as $opcao){
            $opcao->destroy($opcao->id);
        }

        $enquete = $enquete->destroy($id);

        return redirect()->route('enquetes.index');
    }

    public function respondeEnquete(Request $request)
    {
        $data = $request->all();
        $resposta = $data['resposta'];
    }

    public function encerraEnquete(Request $request) {
        $id = $request->id;
        $enquete = Enquete::find($id);

        //if (!$enquete = Enquete::find($id))
          //  return redirect()->back();
        
        echo json_encode($enquete->aberta);

        $enquete->aberta = 0;

        return;
    }
}
