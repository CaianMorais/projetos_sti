<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjetosTranslate extends Model
{
    protected $table = 'projetos_translate';
    protected $fillable = ['projeto_id', 'locale', 'nome_projeto', 'valor_minimo','valor_maximo','autor_projeto','descricao','detalhes','status','visibilidade', 'valor_visibilidade', 'notificar'];

    public function projeto()
    {
        return $this->belongsTo(Projetos::class, 'projeto_id');
    }
}
