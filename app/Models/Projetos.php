<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Projetos extends Model
{
    use HasFactory;

    protected $fillable = ['nome_projeto', 'valor_minimo','valor_maximo','autor_projeto','descricao','detalhes','status','visibilidade', 'valor_visibilidade', 'notificar'];

    public function fotos()
    {
        return $this->hasMany(FotosProjeto::class, 'projeto_id');
    }

    public function contatos()
    {
        return $this->hasMany(ContatoProjeto::class,'projeto_id');
    }

    public function traducoes()
    {
        return $this->hasMany(ProjetosTranslate::class, 'projeto_id');
    }

    public function traducaoAtual()
    {
        return $this->hasOne(ProjetosTranslate::class, 'projeto_id')
                    ->where('locale', app()->getLocale());
    }
}