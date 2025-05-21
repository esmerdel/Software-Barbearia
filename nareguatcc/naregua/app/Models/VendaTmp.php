<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;
use App\Models\Funcionario;
class VendaTmp extends Model
{
    use HasFactory;

    protected $fillable = ['cliente_id', 'funcionarios_id', 'total'];

    public function cliente()
    {
        return $this->belongsTo(Cliente::class);
    }

    public function funcionario()
    {
        return $this->belongsTo(Funcionario::class, 'funcionarios_id');
    }
    public function vendaprodutos()
    {
        return $this->hasMany(VendaProduto::class, 'vendatmps_id');
    }
    
}
