<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEmpresaCategoriasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('empresa_categorias', function (Blueprint $table) {
            $table->id();
            $table->string('slug');
            $table->string('descricao');
            $table->unsignedBigInteger('ramo_id');
            $table->foreign('ramo_id')->references('id')->on('ramos');
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
        Schema::dropIfExists('empresa_categorias');
    }
}
