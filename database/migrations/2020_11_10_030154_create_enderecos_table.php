<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEnderecosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('enderecos', function (Blueprint $table) {
            $table->id();
            $table->string('bairro')->default('Aviário');
            $table->string('rua')->nullable();
            $table->string('cep')->nullable();
            $table->smallInteger('numero')->nullable();
            $table->string('cidade')->default('Feira de Santana');
            $table->string('estado')->default('BA');
            $table->boolean('ehComercial')->default(true);
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
        Schema::dropIfExists('enderecos');
    }
}
