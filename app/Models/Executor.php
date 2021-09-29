<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Executor extends Model
{
    use HasFactory;

    protected $table = "executores";
    protected $fillable = ['tipoExecutor', 'id_especialidade'];
    protected $primaryKey = 'id_executor';

    public function especialidade(){
        return $this->belongsTo("App\Models\Especialidade", "id_especialidade");
    }
}
