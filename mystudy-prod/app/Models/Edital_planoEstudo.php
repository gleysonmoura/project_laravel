<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edital_planoEstudo extends Model
{
    protected $fillable = ['edital_id', 'plano_estudo_id'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'edital_plano_estudo';
}
