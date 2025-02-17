<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipe extends Model
{
    use HasFactory;

    protected $table = 'equipe';

    protected $fillable = ['nome','bio','descricao','linkedin','lattes','telefone','path_foto'];
}
