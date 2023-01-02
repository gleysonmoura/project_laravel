<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Assunto extends Model
{
    protected $fillable = ['assunto_nome', 'disciplina_id', 'assunto_prioridade'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'assuntos';

    public function Disciplina()
    {
        return $this->belongsTo(Disciplina::class);
    }

    public function Atividades ()
    {
        return $this->hasMany(Atividade::class);
    }
}
