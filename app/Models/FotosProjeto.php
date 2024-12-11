<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FotosProjeto extends Model
{
    use HasFactory;

    protected $table = 'fotos_projeto';

    protected $fillable = ['path', 'projeto_id'];

    public function projeto()
    {
        return $this->belongsTo(Projetos::class);
    }
}
