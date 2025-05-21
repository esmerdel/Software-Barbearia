<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Funcionario extends Model
{
    use HasFactory;
    
    protected $fillable = ['nome', 'cargo', 'salario', 'email'];

    // Relacionamento com Agendamento
    public function agendamentos()
    {
        return $this->hasMany(Agendamento::class, 'funcionario_id');
    }
}

