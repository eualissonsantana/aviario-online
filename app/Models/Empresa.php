<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empresa extends Model
{
    use HasFactory;

    public function endereco()
    {
        return $this->belongsTo('App\Models\Endereco');
    }

    public function categoria()
    {
        return $this->belongsTo('App\Models\EmpresaCategoria');
    }

    public function searchName($filter = null) 
    {
        $results = $this->where(function ($query) use($filter) {
            if ($filter) {
                $query->where('nome', 'LIKE', "%{$filter}%");
            }
        })->paginate();

        return $results;
    }

    public function searchCategory($filter = null) 
    {
        $results = $this->where(function ($query) use($filter) {
            if ($filter) {
                $query->where('categoria_id', 'LIKE', "%{$filter}%");
            }
        })->paginate();

        return $results;
    }
}
