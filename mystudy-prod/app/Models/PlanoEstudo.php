<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PlanoEstudo extends Model
{
    protected $fillable = ['plano_nome', 'plano_data', 'plano_status'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'plano_estudos';


    public function Atividades()
    {
        return $this->hasMany(Atividade::class);
    }
}
