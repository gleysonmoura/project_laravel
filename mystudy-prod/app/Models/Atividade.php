<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Atividade extends Model
{
    protected $fillable = ['assunto_id', 'plano_id', 'tags_id', 'atividade_data', 'atividade_status', 'atividade_prioridade', 'atividade_observacao'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'atividades';


    public function Assunto()
    {
        return $this->belongsTo(Assuntos::class);
    }

    public function PlanodeEstudo()
    {
        return $this->belongsTo(PlanoEstudo::class);
    }
}
