<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContatoProjeto extends Model
{
    use HasFactory;
    protected $table = 'contato_projeto';

    protected $fillable = [
        'nome',
        'email',
        'telefone',
        'projeto_id',
        'mensagem',
    ];

    public function projeto()
    {
        return $this->belongsTo(Projetos::class, 'projeto_id');
    }
}
