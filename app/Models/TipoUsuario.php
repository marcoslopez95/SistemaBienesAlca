<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoUsuario extends Model
{
    use HasFactory;

    protected $table = 'tab_tipous';
    protected $primaryKey = 'codigo_tus';
    protected $fillable = [
        'nombre_tus',
    ];
}
