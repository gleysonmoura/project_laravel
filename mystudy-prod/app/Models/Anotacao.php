<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anotacao extends Model
{
    protected $fillable = ['titulo_anotacao', 'texto_anotacao', 'assunto_id', 'plano_id'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'anotacoes';
}
