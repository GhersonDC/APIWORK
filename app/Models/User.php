<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = "cliente";
    protected $primaryKey ="clientid";

    protected $fillable = [
        'nombre',
        'email',
        'password',
        'number',
        'number_old',
        'usuarioid',
        'rfc',
        'tipo',
        'direccion',
        'colonia',
        'ciudad',
        'cp',
        'estado',
        'telefono',
        'contacto',
        'nextel',
        'zoho_accountid',
        'tipocargaid',
        'activo',
        'es_proveedor',
        'nps_promedio',
        'ces_promedio',
        'intervalos_revision',
        'dias_de_credito',
        'especificaciones',
        'portal',
        'portal_usuario',
        'portal_clave',
        'almacen',
        'transporte',
        'facturacion',
        'aamex',
        'aausa',
        'logo',
        'shelter',
        'esporadico',
        'homol',
        'envio_edo_cta',
        'excluir_gbill',
    ];

    protected $hidden = [
        'password',
        'remember_token',
    ];

    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
