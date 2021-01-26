<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opcao extends Model
{
    use HasFactory;

    public function enquete()
    {
        return $this->belongsTo('App\Models\Enquete');
    }

    public function voto()
    {
        return $this->hasMany('App\Models\Voto');
    }
}
