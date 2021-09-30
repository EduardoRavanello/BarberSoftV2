<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProdutoAgendamento extends Model
{
    use HasFactory;
    protected $table = "produto_agendamentos";
    protected $fillable = ['id_produto', 'id_agendamento'];
}
