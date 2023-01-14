<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Bienes extends Model
{
    use HasFactory;

    protected $table = 'tab_bienes';
    protected $primaryKey = 'id_bien';
    public $timestamps = false;
    protected $fillable = [
        'codigo_bien',
        'nombre_bien',
        'satus_bien',
        'foto_bien',
        'fecha_bien',
        'acta_bien',

        'codigo_subcat',
        'codigo_cat',
        'codigo_usu',
        'codigo_dep',
    ];

    public function subcategoria() {
        return $this->belongsTo(subcategoria::class,'codigo_subcat','codigo_subcat');
    }

    public function usuario() {
        return $this->belongsTo(Usuario::class,'codigo_usu','codigo_usu');
    }

    public function departamento(){
        return $this->belongsTo(Departamento::class,'codigo_dep','codigo_dep');
    }
}
