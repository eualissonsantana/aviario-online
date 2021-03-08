<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Enquete extends Model
{
    use HasFactory;

    public function opcao()
    {
        return $this->hasMany('App\Models\Opcao');
    }

    public function qtd_respostas($id)
    {
        $opcoes = DB::table('opcaos')->select('qtd_votos')->where('enquete_id', $id)->get();

        $quantidade = $opcoes->sum('qtd_votos');

        return $quantidade;
    }

    public function opcoes($id) {
        $opcoes = DB::table('opcaos')->where('enquete_id', $id)->get();
        return $opcoes;
    }
}
