<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Disciplina extends Model
{
    use HasFactory;


    public function Assuntos()
    {
        return $this->hasMany(Assunto::class);
    }
}
