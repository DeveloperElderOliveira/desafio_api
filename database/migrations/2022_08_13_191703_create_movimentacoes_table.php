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
        Schema::create('movimentacoes', function (Blueprint $table) {
            $table->id();
            $table->string("tipo",1);
            $table->string("data",8);
            $table->double("valor",10,2);
            $table->string("cpf",11);
            $table->string("cartao",12);
            $table->string("hora",6);
            $table->unsignedBigInteger('loja_id');
            $table->timestamps();

            $table->foreign('loja_id')
                    ->references('id')
                    ->on('lojas')
                    ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('movimentacoes');
    }
};
