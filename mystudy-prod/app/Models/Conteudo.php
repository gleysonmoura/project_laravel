<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Conteudo extends Model
{
    protected $fillable = ['assunto_id', 'edital_id'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'conteudos';


    public function edital()
    {
        return $this->belongsTo(Edital::class);
    }
}
