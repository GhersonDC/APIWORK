<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Client extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "instructionletter";

    protected $fillable = [
        'customerId',
        'address',
        'rfc',
        'email',
        'phone_number',
        'type_service',
        'reference',
        'incoterm',
        'type_equipment',
        'pickup_address',
        'pol',
        'pod',
        'delivery_address',
        'description',
        'tariff',
        'type_packaging',
        'volume',
        'weight',
        'cbm',
        'quantity',
        'lenght',
        'width',
        'height',
        'special_description',
        //timestamps
        'createdAt',
        'createdBy',
        'updatedAt',
    ];

    public function Cartas()
    {
        return $this->hasMany('App\User', 'clientid');
    }

}
