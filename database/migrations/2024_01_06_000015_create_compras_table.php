<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('compras', function (Blueprint $table) {
            $table->id();
            $table->integer('qtdPassagensCompra');
            $table->float('valorTotalCompra');
            $table->foreignId('forma_pagamento_id')->constrained('forma_pagamentos');
            $table->foreignId('acao_id')->constrained('acaos'); 
            $table->foreignId('bilhete_id')->constrained('bilhetes');
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
        Schema::dropIfExists('compras');
    }
};
