<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Produto extends Model
{
    use HasFactory;

    protected $table = "produtos";
    protected $fillable = ['descricao', 'quantidade', 'valorUnit', 'valorTotal'];
    protected $primaryKey = 'id_produto';
}
