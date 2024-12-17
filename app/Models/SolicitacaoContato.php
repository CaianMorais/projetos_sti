<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SolicitacaoContato extends Model
{
    use HasFactory;
    protected $table = 'solicitacao_contatos';

    protected $fillable = [
        'nome',
        'telefone',
        'email',
        'assunto',
        'mensagem',
    ];
}
