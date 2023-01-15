<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Builder;
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

    public function getFechaBienAttribute($value){
        return Carbon::parse($value)->format('d-m-Y');
    }
    public function getFotoBienAttribute($value){
        return str_replace("public","storage",$value);
    }
    public function getActaBienAttribute($value){
        return str_replace("public","storage",$value);

    }

    // Relaciones
    public function subcategoria() {
        return $this->belongsTo(SubCategoria::class,'codigo_subcat','codigo_subcat');
    }

    public function usuario() {
        return $this->belongsTo(Usuario::class,'codigo_usu','codigo_usu');
    }

    public function departamento(){
        return $this->belongsTo(Departamento::class,'codigo_dep','codigo_dep');
    }
    // -----------------------------------

    public function scopeFilter(Builder $q, $request){
        return $q->when($request->name, function($q,$name){
            return $q->where('nombre_bien','like',"%$name%");
        })
        ->when($request->codigo_bien, function($q,$codigo){
            return $q->where('codigo_bien','like',"%$codigo%");
        })
        ->when($request->status,function($q,$status){
            return $q->whereIn('satus_bien',$status);
        })
        ->when($request->date_ini && $request->date_end,function($q) use ($request){
            $init = Carbon::parse($request->date_ini)->startOfDay(); // 15/01/2023 00:00:00
            $end = Carbon::parse($request->date_end)->endOfDay();    // 23/01/2023 23:59:59
            return $q->whereBetween('fecha_bien',[$init,$end]); // Esto es para obtener los registros entre las dos fechas.
        })
        ->when($request->codigo_cat, function($q,$codigo){
            return $q->whereIn('codigo_cat',$codigo);
        })
        ->when($request->codigo_subcat, function($q,$codigo){
            return $q->whereIn('codigo_subcat',$codigo);
        })
        ->when($request->codigo_dep, function($q,$codigo){
            return $q->whereIn('codigo_dep',$codigo);
        })
        ;
    }
}
