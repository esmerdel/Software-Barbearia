<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::table('venda_tmps', function (Blueprint $table) {
            $table->dropColumn('nome_funcionario');
            $table->unsignedBigInteger('funcionarios_id');
            $table->foreign('funcionarios_id')
                ->references('id')
                ->on("funcionarios")
                ->onDelete("restrict");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
