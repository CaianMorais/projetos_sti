<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContatoArmazenado extends Model
{
    use HasFactory;

    protected $table = 'contatos_armazenados';

    protected $fillable = [
        'name',
        'email',
    ];
}
