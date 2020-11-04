<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresas', function (Blueprint $table) {
            $table->id();
            $table->string('nome');
            $table->string('slogan')->nullable();
            $table->longText('descricao')->nullable();
            $table->string('telefone');
            $table->boolean('ehWhats')->default(0);
            $table->string('email')->nullable();
            $table->string('youtube')->nullable();
            $table->string('instagram')->nullable();
            $table->string('facebook')->nullable();
            $table->boolean('boleto')->default(0);
            $table->boolean('cartao')->default(0);
            $table->boolean('dinheiro')->default(1);
            $table->unsignedBigInteger('categoria_id');
            $table->unsignedBigInteger('endereco_id');
            $table->foreign('categoria_id')->references('id')->on('empresa_categorias');
            $table->foreign('endereco_id')->references('id')->on('enderecos');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('empresas');
    }
}
