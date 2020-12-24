<?php

namespace Database\Seeders;

use App\Models\EmpresaCategoria;
use Illuminate\Database\Seeder;

class EmpresaCategoriasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categorias = [
            [
                'descricao' => 'Bijuterias e Acessórios',
                'ramo_id' => '1',
                'slug' => 'bijuterias-e-acessorios'
            ],[
                'descricao' => 'Clínicas de Estética',
                'ramo_id' => '1',
                'slug' => 'clinicas-de-estetica'
            ],[
                'descricao' => 'Perfumes e Cosméticos',
                'ramo_id' => '1',
                'slug' => 'perfumes-e-cosmeticos'
            ],[
                'descricao' => 'Esmalteria',
                'ramo_id' => '1',
                'slug' => 'esmalteria'
            ],[
                'descricao' => 'Salão de Beleza',
                'ramo_id' => '1',
                'slug' => 'salao-de-beleza'
            ],[
                'descricao' => 'Barbearia',
                'ramo_id' => '1',
                'slug' => 'barbearia'
            ],[
                'descricao' => 'Casa de Festa (Aluguel)',
                'ramo_id' => '2',
                'slug' => 'casa-de-festa-aluguel'
            ],[
                'descricao' => 'Buffets',
                'ramo_id' => '2',
                'slug' => 'buffets'
            ],[
                'descricao' => 'Fotográfos',
                'ramo_id' => '2',
                'slug' => 'fotografos'
            ],[
                'descricao' => 'Igrejas e Templos Religiosos',
                'ramo_id' => '2',
                'slug' => 'igrejas-e-templos-religiosos'
            ],[
                'descricao' => 'Lojas de Noivas',
                'ramo_id' => '2',
                'slug' => 'lojas-de-noivas'
            ],[
                'descricao' => 'Músicos, Bandas e Grupos Musicais',
                'ramo_id' => '2',
                'slug' => 'musicos-bandas-e-grupos-musicais'
            ],[
                'descricao' => 'Venda e Locação de Trajes Masculinos',
                'ramo_id' => '2',
                'slug' => 'venda-e-locacao-de-trajes-masculinos'
            ],[
                'descricao' => 'Pedreiros',
                'ramo_id' => '3',
                'slug' => 'pedreiros'
            ],[
                'descricao' => 'Pintores',
                'ramo_id' => '3',
                'slug' => 'pintores'
            ],[
                'descricao' => 'Eletricistas',
                'ramo_id' => '3',
                'slug' => 'eletricistas'
            ],[
                'descricao' => 'Encanadores',
                'ramo_id' => '3',
                'slug' => 'encanadores'
            ],[
                'descricao' => 'Corretor de Seguro',
                'ramo_id' => '3',
                'slug' => 'corretor-de-seguro'
            ],[
                'descricao' => 'Corretor de Imóveis',
                'ramo_id' => '3',
                'slug' => 'corretor-de-imoveis'
            ],[
                'descricao' => 'Engenheiros',
                'ramo_id' => '3',
                'slug' => 'engenheiros'
            ],[
                'descricao' => 'Artesão',
                'ramo_id' => '3',
                'slug' => 'artesao'
            ],[
                'descricao' => 'Diarista',
                'ramo_id' => '3',
                'slug' => 'diarista'
            ],[
                'descricao' => 'Acabamentos e Revestimentos',
                'ramo_id' => '4',
                'slug' => 'acabamentos-e-revestimentos'
            ],[
                'descricao' => 'Calhas',
                'ramo_id' => '4',
                'slug' => 'calhas'
            ],[
                'descricao' => 'Ferragens',
                'ramo_id' => '4',
                'slug' => 'ferragens'
            ],[
                'descricao' => 'Gesso',
                'ramo_id' => '4',
                'slug' => 'gesso'
            ],[
                'descricao' => 'Madereiras',
                'ramo_id' => '4',
                'slug' => 'madereiras'
            ],[
                'descricao' => 'Mármores e Granitos',
                'ramo_id' => '4',
                'slug' => 'marmores-e-granitos'
            ],[
                'descricao' => 'Materiais de Construção',
                'ramo_id' => '4',
                'slug' => 'materiais-de-construcao'
            ],[
                'descricao' => 'Materiais Elétricos',
                'ramo_id' => '4',
                'slug' => 'materiais-eletricos'
            ],[
                'descricao' => 'Pré-Moldados e Artefatos de Cimento',
                'ramo_id' => '4',
                'slug' => 'pre-moldados-e-artefatos-de-cimento'
            ],[
                'descricao' => 'Tintas',
                'ramo_id' => '4',
                'slug' => 'tintas'
            ],[
                'descricao' => 'Vidraçarias e Esquadras de Alumínio',
                'ramo_id' => '4',
                'slug' => 'vidracaria-e-esquadras-de-aluminio'
            ],[
                'descricao' => 'Refrigeração',
                'ramo_id' => '4',
                'slug' => 'refrigeracao'
            ],[
                'descricao' => 'Cursos Preparatórios para Concursos',
                'ramo_id' => '5',
                'slug' => 'cursos-preparatorios-para-concursos'
            ],[
                'descricao' => 'Cursos Pré-Vestibulares',
                'ramo_id' => '5',
                'slug' => 'cursos-pre-vestibulares'
            ],[
                'descricao' => 'Cursos Técnicos e Profissionalizantes',
                'ramo_id' => '5',
                'slug' => 'cursos-tecnicos-e-profissionalizantes'
            ],[
                'descricao' => 'Escolas de Cabeleireiro, Manicure e Pedicure',
                'ramo_id' => '5',
                'slug' => 'escolas-de-cabeleireiro-manicure-e-pedicure'
            ],[
                'descricao' => 'Escolas de Ensino Fundamental',
                'ramo_id' => '5',
                'slug' => 'escolas-de-ensino-fundamental'
            ],[
                'descricao' => 'Escolas de Ensino Infantil',
                'ramo_id' => '5',
                'slug' => 'escolas-de-ensino-infantil'
            ],[
                'descricao' => 'Escolas de Ensino Médio',
                'ramo_id' => '5',
                'slug' => 'escolas-de-ensino-medio'
            ],[
                'descricao' => 'Escolas de Idiomas',
                'ramo_id' => '5',
                'slug' => 'escolas-de-idioma'
            ],[
                'descricao' => 'Escolas de Informática',
                'ramo_id' => '5',
                'slug' => 'escolas-de-informatica'
            ],[
                'descricao' => 'Faculdades e Universidades',
                'ramo_id' => '5',
                'slug' => 'faculdades-e-universidades'
            ],[
                'descricao' => 'Professores e/ou Instrutores',
                'ramo_id' => '5',
                'slug' => 'professores-e-ou-instrutores'
            ],[
                'descricao' => 'Reforço Escolar',
                'ramo_id' => '5',
                'slug' => 'reforco-escolar'
            ],[
                'descricao' => 'Afiação de Ferramentas',
                'ramo_id' => '6',
                'slug' => 'afiacao-de-ferramentas'
            ],[
                'descricao' => 'Indústria Alimentícia',
                'ramo_id' => '6',
                'slug' => 'industria-alimenticia'
            ],[
                'descricao' => 'Indústria de Couro e Calçados',
                'ramo_id' => '6',
                'slug' => 'industria-de-couro-e-calcados'
            ],[
                'descricao' => 'Indústria Mecânica',
                'ramo_id' => '6',
                'slug' => 'industria-mecanica'
            ],[
                'descricao' => 'Indústria Moveleira',
                'ramo_id' => '6',
                'slug' => 'industria-moveleira'
            ],[
                'descricao' => 'Indústria Química e Farmacêutica',
                'ramo_id' => '6',
                'slug' => 'industria-quimica-e-farmaceutica'
            ],[
                'descricao' => 'Indústrias Diversas',
                'ramo_id' => '6',
                'slug' => 'industrias-diversas'
            ],[
                'descricao' => 'Indústria Têxtil',
                'ramo_id' => '6',
                'slug' => 'industria-textil'
            ],[
                'descricao' => 'Bares, Choperias e Pesticarias',
                'ramo_id' => '7',
                'slug' => 'bares-choperias-e-pesticarias'
            ],[
                'descricao' => 'Lanchonete',
                'ramo_id' => '7',
                'slug' => 'lanchonete'
            ],[
                'descricao' => 'Churrascarias',
                'ramo_id' => '7',
                'slug' => 'churrascarias'
            ],[
                'descricao' => 'Hamburguerias',
                'ramo_id' => '7',
                'slug' => 'hamburguerias'
            ],[
                'descricao' => 'Lanches',
                'ramo_id' => '7',
                'slug' => 'lanches'
            ],[
                'descricao' => 'Panificadoras e Confeitarias',
                'ramo_id' => '7',
                'slug' => 'panificadoras-e-confeitarias'
            ],[
                'descricao' => 'Pastelarias',
                'ramo_id' => '7',
                'slug' => 'pastelarias'
            ],[
                'descricao' => 'Pizzarias',
                'ramo_id' => '7',
                'slug' => 'pizzarias'
            ],[
                'descricao' => 'Restaurantes',
                'ramo_id' => '7',
                'slug' => 'restaurantes'
            ],[
                'descricao' => 'Calçados',
                'ramo_id' => '8',
                'slug' => 'calcados'
            ],[
                'descricao' => 'Cama, Mesa e Banho',
                'ramo_id' => '8',
                'slug' => 'cama-mesa-e-banho'
            ],[
                'descricao' => 'Móveis Novos e Eletros',
                'ramo_id' => '8',
                'slug' => 'moveis-novos-e-eletros'
            ],[
                'descricao' => 'Supermercados e Mercados',
                'ramo_id' => '8',
                'slug' => 'supermercados-e-mercados'
            ],[
                'descricao' => 'Auto Elétricas',
                'ramo_id' => '9',
                'slug' => 'auto-eletricas'
            ],[
                'descricao' => 'Auto Peças e Acessórios para Carros',
                'ramo_id' => '9',
                'slug' => 'auto-pecas-e-acessorios-para-carros'
            ],[
                'descricao' => 'Funilaria e Pintura',
                'ramo_id' => '9',
                'slug' => 'funilaria-e-pintura'
            ],[
                'descricao' => 'Oficinas Mecânicas - Veículos e Utilitários',
                'ramo_id' => '9',
                'slug' => 'oficinas-mecanicas-veiculos-e-utilitarios'
            ],[
                'descricao' => 'Auto Peças e Acessórios para Motos',
                'ramo_id' => '10',
                'slug' => 'auto-pecas-e-acessorios-para-motos'
            ],[
                'descricao' => 'Oficinas Mecânicas - Motocicletas',
                'ramo_id' => '10',
                'slug' => 'oficinas-mecanicas-motocicletas'
            ],[
                'descricao' => 'Revenda de Motocicletas Semi-Novas',
                'ramo_id' => '10',
                'slug' => 'revenda-de-motocicletas-semi-novas'
            ],[
                'descricao' => 'Academias de Musculação',
                'ramo_id' => '11',
                'slug' => 'academias-de-musculacai'
            ],[
                'descricao' => 'Farmácias e Drogarias',
                'ramo_id' => '11',
                'slug' => 'farmacias-e-drogarias'
            ],[
                'descricao' => 'Hospitais',
                'ramo_id' => '11',
                'slug' => 'hospitais'
            ],[
                'descricao' => 'Laboratórios',
                'ramo_id' => '11',
                'slug' => 'laboratorios'
            ],[
                'descricao' => 'Planos de Saúde',
                'ramo_id' => '11',
                'slug' => 'planos-de-saude'
            ],[
                'descricao' => 'Pronto Socorro Emergência e Urgência',
                'ramo_id' => '11',
                'slug' => 'pronto-socorro-emergencia-e-urgencia'
            ],[
                'descricao' => 'Unidade de Saúde',
                'ramo_id' => '11',
                'slug' => 'unidade-de-saude'
            ],[
                'descricao' => 'Cuidador de Criança',
                'ramo_id' => '11',
                'slug' => 'cuidador-de-crianca'
            ],[
                'descricao' => 'Cuidador de Idoso',
                'ramo_id' => '11',
                'slug' => 'cuidador-de-idoso'
            ],[
                'descricao' => 'Aeroportos',
                'ramo_id' => '12',
                'slug' => 'aeroportos'
            ],[
                'descricao' => 'Mototáxi',
                'ramo_id' => '12',
                'slug' => 'mototaxi'
            ],[
                'descricao' => 'Táxi',
                'ramo_id' => '12',
                'slug' => 'taxi'
            ],[
                'descricao' => 'Transportadoras',
                'ramo_id' => '12',
                'slug' => 'transportadoras'
            ],[
                'descricao' => 'Transporto Rodoviário de Passageiros',
                'ramo_id' => '12',
                'slug' => 'transporto-roviario-de-passageiros'
            ],[
                'descricao' => 'Uber / 99',
                'ramo_id' => '12',
                'slug' => 'uber-99'
            ],[
                'descricao' => 'Calçados',
                'ramo_id' => '13',
                'slug' => 'calcados'
            ],[
                'descricao' => 'Moda Bebê Gestante',
                'ramo_id' => '13',
                'slug' => 'moda-bebe-gestante'
            ],[
                'descricao' => 'Moda Feminina',
                'ramo_id' => '13',
                'slug' => 'moda-feminina'
            ],[
                'descricao' => 'Moda Fitness',
                'ramo_id' => '13',
                'slug' => 'moda-fitness'
            ],[
                'descricao' => 'Moda Infantil',
                'ramo_id' => '13',
                'slug' => 'moda-infantil'
            ],[
                'descricao' => 'Moda Íntima',
                'ramo_id' => '13',
                'slug' => 'moda-intima'
            ],[
                'descricao' => 'Moda Masculina',
                'ramo_id' => '13',
                'slug' => 'moda-masculina'
            ],[
                'descricao' => 'Moda Praia',
                'ramo_id' => '13',
                'slug' => 'moda-praia'
            ],[
                'descricao' => 'Condomínio/Residenciais',
                'ramo_id' => '14',
                'slug' => 'condominios-residencias'
            ],[
                'descricao' => 'Associação de Moradores',
                'ramo_id' => '15',
                'slug' => 'associacao-de-moradores'
            ],[
                'descricao' => 'Associação Desportiva',
                'ramo_id' => '15',
                'slug' => 'associacao-desportiva'
            ],[
                'descricao' => 'Associação Cultural',
                'ramo_id' => '15',
                'slug' => 'associacao-cultural'
            ],[
                'descricao' => 'ONGs',
                'ramo_id' => '15',
                'slug' => 'ongs'
            ]
        ];

        foreach($categorias as $categoria){
            EmpresaCategoria::create($categoria);
        }
            
    }
}
