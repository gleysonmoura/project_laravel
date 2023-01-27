<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercicio extends Model
{
    protected $fillable = ['atividade_id', 'exer_quantidade', 'exer_status'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'exercicios';

    public function Atividades()
    {
        return $this->belongsTo(Atividade::class);
    }
}
