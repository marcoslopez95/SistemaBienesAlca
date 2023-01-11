<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bienes extends Model
{
    use HasFactory;

    protected $table = 'tab_bienes';
    protected $primaryKey = 'id_bien';
    protected $fillable = [
        'codigo_bien',
        'nombre_bien',
        'satus_bien',
        'foto_bien',
        'fecha_bien',

        'codigo_cat',
        'codigo_usu',
        'codigo_ubi',
    ];

    public function categoria() {
        return $this->belongsTo(Categoria::class,'codigo_cat','codigo_cat');
    }

    public function usuario() {
        return $this->belongsTo(Usuario::class,'codigo_usu','codigo_usu');
    }

    public function ubicacion(){
        return $this->belongsTo(Ubicacion::class,'codigo_ubi','codigo_ubi');
    }
}
