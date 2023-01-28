<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Director extends Model
{
    use HasFactory;

    protected $table = 'tab_direc';
    protected $primaryKey = 'cedula_dire';
    protected $keyType = 'string';
    public $incrementing = false;
    public $timestamps = false;
    protected $fillable = [
        'cedula_dire',
        'nombre_dire',
        'apelli_dire',
    ];

    public function departamento(){
        return $this->hasOne(Departamento::class,'cedula_dire','cedula_dire');
    }

    public function getFullNameAttribute(){
        return $this->nombre_dire.' '.$this->apelli_dire;
    }
}
