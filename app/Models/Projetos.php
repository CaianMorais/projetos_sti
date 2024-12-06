<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projetos extends Model
{
    use HasFactory;

    protected $fillable = ['nome_projeto', 'valor_minimo','valor_maximo','autor_projeto','descricao','detalhes','status'];

    public function fotos()
    {
        return $this->hasMany(FotosProjeto::class);
    }
}