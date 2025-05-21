<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateAgendamentosTable extends Migration
{
    public function up()
{
    Schema::create('agendamentos', function (Blueprint $table) {
        $table->id();
        $table->foreignId('cliente_id')->constrained('clientes')->onDelete('cascade'); // Especificando explicitamente a tabela
        $table->foreignId('servico_id')->constrained('servicos')->onDelete('cascade'); // Especificando explicitamente a tabela
        $table->foreignId('funcionario_id')->constrained('funcionarios')->onDelete('cascade'); // Especificando explicitamente a tabela
        $table->dateTime('data_horario');
        $table->timestamps();
    });
}



    public function down()
    {
        Schema::dropIfExists('agendamentos');
    }
};
