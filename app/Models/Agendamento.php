<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Agendamento;

class Agendamento extends Model
{
    use HasFactory;

    protected $table = "agendamentos";
    protected $fillable = ['data', 'hora','status', 'id_servico', 'id_executor', 'id_cliente'];
    protected $primaryKey = 'id_agendamento';


    public function servico(){
        return $this->belongsTo("App\Models\Servico", "id_servico");
    }

    public function cliente(){
        return $this->belongsTo("App\Models\Cliente", "id_cliente");
    }

    public function executor(){
        return $this->belongsTo("App\Models\Executor", "id_executor");
    }

}
