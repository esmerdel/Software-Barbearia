<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\VendaTmp;
use App\Models\Produto;
use App\Models\Cliente;


class VendaProduto extends Model
{
    use HasFactory;

    protected $fillable = ['produtos_id', 'vendatmps_id', 'valor', 'qtde'];

    public function vendatmp()
    {
        return $this->belongsTo(VendaTmp::class);
    }

    public function produto()
    {
        return $this->belongsTo(Produto::class, 'produtos_id');
    }    
}
