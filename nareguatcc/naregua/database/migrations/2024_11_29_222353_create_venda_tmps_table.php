<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::table('venda_tmps', function (Blueprint $table) {
            $table->dropColumn('nome_funcionario');
            $table->unsignedBigInteger('funcionario_id')->after('cliente_id');
    
            $table->foreign('funcionario_id')->references('id')->on('funcionarios');
        });
    }
    
    public function down()
    {
        Schema::table('venda_tmps', function (Blueprint $table) {
            $table->dropForeign(['funcionario_id']);
            $table->dropColumn('funcionario_id');
            $table->string('nome_funcionario')->after('cliente_id');
        });
    }    
};
