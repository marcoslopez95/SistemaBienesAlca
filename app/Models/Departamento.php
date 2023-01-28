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
        'cedula_dire'
    ];
    public $timestamps = false;

    public function bienes(){
        return $this->hasMany(Bienes::class,'codigo_dep','codigo_dep');
    }

    public function director(){
        return $this->belongsTo(Director::class,'cedula_dire','cedula_dire');
    }
}
