<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Meta extends Model
{
    protected $fillable = ['atividade_id', 'meta_quantidade', 'meta_status'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'metas';

    public function Atividades()
    {
        return $this->belongsTo(Atividade::class);
    }
}
