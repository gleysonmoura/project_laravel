<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Edital extends Model
{
    protected $fillable = ['instituicao_edital', 'cargo_edital'];
    protected $guarded = ['id', 'created_at', 'update_at'];
    protected $table = 'editais';

    public function planosDeEstudo()
    {
        return $this->belongsToMany(PlanoEstudo::class);
    }
    public function Conteudos()
    {
        return $this->hasMany(Conteudo::class);
    }
    public function assuntos()
    {
        return $this->belongsToMany(Assunto::class, 'conteudo');
    }
}
