<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Ramo;
use Illuminate\Support\Str;

class RamosTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ramos = [
            [ 
                'descricao' => 'Beleza',
                'slug' => 'beleza'
            ],[
                'descricao' => 'Casamento',
                'slug' => 'casamento'
            ],[
                'descricao' => 'Serviços',
                'slug' => 'servicos'
            ],[
                'descricao' => 'Materiais/Serviços',
                'slug' => 'materias-e-servicos'
            ],[
                'descricao' => 'Educação',
                'slug' => 'educacao'
            ],[
                'descricao' => 'Indústrias',
                'slug' => 'industrias'
            ],[
                'descricao' => 'Onde Comer',
                'slug' => 'onde-comer'
            ],[
                'descricao' => 'Onde Comprar',
                'slug' => 'onde-comprar'
            ],[
                'descricao' => 'Para Seu carro',
                'slug' => 'para-seu-carro'
            ],[
                'descricao' => 'Para Sua Moto',
                'slug' => 'para-sua-moto'
            ],[
                'descricao' => 'Saúde',
                'slug' => 'saude'
            ],[
                'descricao' => 'Transportes',
                'slug' => 'transportes'
            ],[
                'descricao' => 'Vestuário',
                'slug' => 'vestuario'
            ],[
                'descricao' => 'Moradia',
                'slug' => 'moradia'
            ],[
                'descricao' => 'Instituições e entidades',
                'slug' => 'instituicoes-e-entidades'
            ]
        ];
        foreach($ramos as $ramo){
            Ramo::create($ramo);
        }
    }
}
