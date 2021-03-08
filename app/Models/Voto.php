<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Voto extends Model
{
    use HasFactory;

    public function opcao()
    {
        return $this->belongsTo('App\Models\Opcao');
    }

   
}
