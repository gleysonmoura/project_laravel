<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anotacao extends Model
{
    protected $fillable = ['tag_notas'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'anotacoes';
}
