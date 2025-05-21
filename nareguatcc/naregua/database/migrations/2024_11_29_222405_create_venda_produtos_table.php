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
        Schema::create('venda_produtos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->unsignedBigInteger('produtos_id');
            $table->foreign('produtos_id')
                ->references('id')
                ->on("produtos")
                ->onDelete("restrict");
            $table->unsignedBigInteger('vendatmps_id');        
            $table->foreign('vendatmps_id')
                ->references('id')
                ->on("venda_tmps")
                ->onDelete("restrict");
            $table->decimal("valor", 8, 2);
            $table->mediumInteger("qtde");
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('venda_produtos');
    }
};
