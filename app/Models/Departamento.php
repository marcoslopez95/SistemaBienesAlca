<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Departamento extends Model
{
    use HasFactory;

    protected $table = 'tab_depart';
    protected $primaryKey = 'codigo_dep';
    protected $fillable = [
        'nombre_dep',
    ];
    public $timestamps = false;
}
