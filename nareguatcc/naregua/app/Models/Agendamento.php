<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = 'agendamentos'; // Nome da tabela
    protected $fillable = [
        'cliente_id', // Corrigido para 'cliente_id' 
        'servico_id',
        'funcionario_id',
        'data_horario',
    ];

    // Relacionamentos
    public function servico()
    {
        return $this->belongsTo(Servico::class, 'servico_id');
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionario_id');
    }

    public function cliente()  // Adicionado o relacionamento com o Cliente
    {
        return $this->belongsTo(Cliente::class, 'cliente_id');  // A chave estrangeira 'cliente_id' no modelo Agendamento
    }
}
