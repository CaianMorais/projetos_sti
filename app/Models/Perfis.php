<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfis extends Model
{
    use HasFactory;
    protected $fillable = ['nome_perfil'];

    public function users()
    {
        return $this->hasMany(User::class);
    }
}
