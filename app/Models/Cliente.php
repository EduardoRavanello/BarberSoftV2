<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Cliente;

class Cliente extends Model
{
    use HasFactory;

    protected $table = "clientes";
    protected $fillable = ['nome', 'endereco', 'telefone', 'genero'];
    protected $primaryKey = 'id_cliente';
}
