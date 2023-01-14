<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategoria extends Model
{
    use HasFactory;

    protected $table = 'tab_subcat';
    protected $primaryKey = 'codigo_subcat';
    protected $fillable = [
        'nombre_subcat',
        'descri_subcat',
        'codigo_cat'
    ];
    public $timestamps = false;

    public function categoria()
    {
        return $this->belongsTo(Categoria::class,'codigo_cat','codigo_cat');
    }
}
