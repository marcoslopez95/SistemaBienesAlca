<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'tab_usuari';
    protected $primaryKey = 'codigo_usu';
    protected $fillable = [
        'cedula_usu',
        'nombre_usu',
        'apelli_usu',
        'telefo_usu',
        'correo_usu',
        'direcc_usu',
        'clave_usu',
    ];
    protected $hidden = [
        'clave_usu'
    ];
}
