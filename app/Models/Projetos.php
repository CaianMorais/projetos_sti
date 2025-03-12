<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projetos extends Model
{
    use HasFactory;

    protected $fillable = ['nome_projeto', 'valor_minimo','valor_maximo','autor_projeto','descricao','detalhes','status','visibilidade'];

    public function fotos()
    {
        return $this->hasMany(FotosProjeto::class, 'projeto_id');
    }

    public function contatos()
    {
        return $this->hasMany(ContatoProjeto::class,'projeto_id');
    }
}