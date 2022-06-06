<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\ClientResource;
//catalogs
use App\Models\Ports;
use App\Models\Location;
use App\Models\PackagingType;
use App\Models\EquipmentType;
use App\Models\ServiceType;

use Illuminate\Http\Request;
use Validator;

class CatalogController extends BaseController
{
    public function ports()
    {
        $products = Ports::all();
        
        return $this->sendResponse($products, 'Customer Instruction Letters retrieved successfully.');
    }
    public function location()
    {
        $products = Location::all();
        
        return $this->sendResponse($products, 'Customer Instruction Letters retrieved successfully.');
    }
    public function type_packaging()
    {
        $products = PackagingType::all();
        
        return $this->sendResponse($products, 'Customer Instruction Letters retrieved successfully.');
    }
    public function type_equipment()
    {
        $products = EquipmentType::all();
        
        return $this->sendResponse($products, 'Customer Instruction Letters retrieved successfully.');
    }
    public function type_service()
    {
        $products = ServiceType::all();
        
        return $this->sendResponse($products, 'Customer Instruction Letters retrieved successfully.');
    }
}

?>