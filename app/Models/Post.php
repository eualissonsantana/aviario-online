<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user()
    {
        return $this->belongsTo('App\Models\User');
    }

    public function searchTitulo($filter = null) 
    {
        $results = $this->where(function ($query) use($filter) {
            if ($filter) {
                $query->where('titulo', 'LIKE', "%{$filter}%");
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


