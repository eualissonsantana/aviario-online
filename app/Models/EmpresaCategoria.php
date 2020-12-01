<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmpresaCategoria extends Model
{
    use HasFactory;
    
    public function empresa()
    {
        return $this->hasMany('App\Models\Empresa');
    }

    public function ramo()
    {
        return $this->belongsTo('App\Models\Ramo');
    }

    public function search($filter = null) 
    {
        $results = $this->where(function ($query) use($filter) {
            if ($filter) {
                $query->where("ramo_id", "=" ,"$filter");
            }
        })->paginate();

        return $results;
    }
}
