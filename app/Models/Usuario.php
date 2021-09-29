<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    protected $table = "usuarios";
    protected $fillable = ['nome', 'user', 'senha', 'telefone', 'id_executor'];
    protected $primaryKey = 'id_usuario';

    public function executor(){
        return $this->belongsTo("App\Models\Executor", "id_executor");
    }
}
