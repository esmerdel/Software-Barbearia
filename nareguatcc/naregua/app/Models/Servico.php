<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Servico extends Model
{
    use HasFactory;

    // Define a tabela associada ao modelo
    protected $table = 'servicos';

    // Define os campos que podem ser preenchidos em massa
    protected $fillable = [
        'nome',
        'descricao',
        'preco',
    ];

    // Define regras de validação para o modelo
    public static function regrasValidacao($id = null)
    {
        return [
            'nome' => 'required|string|max:255|unique:servicos,nome,' . $id,
            'descricao' => 'nullable|string',
            'valor' => 'required|numeric|min:0',
            'duracao' => 'nullable|integer|min:1',
        ];
    }
}
