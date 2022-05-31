<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClientResource extends JsonResource
{
    public function toArray($request)
    {
        return [

            'id' => $this->id,
            'customerId' => $this->customerId,
            'address' => $this-> address,
            'rfc' => $this-> rfc,
            'email' => $this-> email,
            'phone_number' => $this->phone_number,
            'type_service' => $this->type_service,
            'reference' => $this->reference,
            'incoterm' => $this->incoterm,
            'type_equipment' => $this->type_equipment,
            'pickup_address' => $this->pickup_address,
            'pol' => $this->pol,
            'pod' => $this->pod,
            'delivery_address' => $this->delivery_address,
            'description' => $this->description,
            'tariff' => $this->tariff,
            'type_packaging' => $this->type_packaging,
            'volume' => $this->volume,
            'weight' => $this->weight,
            'cbm' => $this->cbm,
            'quantity' => $this->quantity,
            'lenght' => $this->lenght,
            'width' => $this->width,
            'height' => $this->height,
            'special_description' => $this->special_description,
            'createdBy' => $this->createdBy,
            'createdAt' => $this->created_at,
            'updatedAt' => $this->updated_at,

        ];
    }
}
