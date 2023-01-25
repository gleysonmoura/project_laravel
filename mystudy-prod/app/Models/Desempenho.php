<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Desempenho extends Model
{
    protected $fillable = ['exer_id', 'desempenho_quantidade', 'desempenho_certas', 'desempenho_erradas', 'desempenho_porcentagem'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'desempenhos';
}
