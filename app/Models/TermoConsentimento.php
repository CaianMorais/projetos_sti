<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TermoConsentimento extends Model
{
    use HasFactory;
    protected $table = 'termo_consentimento';
    protected $fillable = ['titulo_termo', 'termo', 'data_vigor'];
}
