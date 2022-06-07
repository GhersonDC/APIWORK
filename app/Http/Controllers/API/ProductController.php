<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Validator;

class ProductController extends BaseController
{

    // public function index($customerId)
    // {

        
    // }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            //1
            'customerId'=> 'integer|required|min:1',
            'address'=> 'nullable',
            'rfc' => 'nullable',
            'email'=> 'email|nullable',
            'phone_number'=> 'string|nullable',
            //2
            'type_service'=> 'integer|required|min:1|max:6',
            'reference'=> 'integer|nullable',
            'incoterm'=> 'in:EXW,FCA,CPT,CIP,DAP,DPU,DDP,CFR,FOB,FAS,CIF|required',
            'type_equipment'=> 'integer|required',
            'pickup_address'=> 'integer|required',
            'pol'=> 'integer|required',
            'pod'=> 'integer|required',
            'delivery_address'=> 'integer|required',
            //3
            'description'=> 'required',
            'tariff'=> 'required|min:8|max:10',
            'type_packaging'=> 'integer|required',
            'volume'=> 'numeric|required',
            'weight'=> 'numeric|nullable',
            'cbm'=> 'numeric|required',
            'quantity'=> 'integer|nullable',
            //4
            'lenght'=> 'numeric|nullable',
            'width'=> 'numeric|nullable',
            'height'=> 'numeric|nullable',
            'special_description'=> 'string|nullable',

            //timestamps
            'createdAt'=> 'nullable',
            'createdBy'=> 'nullable',
            'updatedAt'=> 'nullable',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $product = Client::create($input);
        return $this->sendResponse(new ClientResource($product), 'Instruction Letter created successfully.');

    }

    public function show($customerId)
    {

        $products = Client::where("customerId","=",$customerId)
        ->join("servicetypecatalogletter","instructionletter.type_service","=","servicetypecatalogletter.id")
        ->get();
        
        return $this->sendResponse($products, 'Customer Instruction Letters retrieved successfully.');
    }

    public function update(Request $request, Client $product)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            //1
            'customerId'=> 'integer|required|min:1',
            'address'=> 'nullable',
            'rfc' => 'nullable',
            'email'=> 'email|nullable',
            'phone_number'=> 'string|nullable',
            //2
            'type_service'=> 'numeric|required',
            'reference'=> 'nullable',
            'incoterm'=> 'in:EXW,FCA,CPT,CIP,DAP,DPU,DDP,CFR,FOB,FAS,CIF|required',
            'type_equipment'=> 'string|required',
            'pickup_address'=> 'string|required',
            'pol'=> 'string|required',
            'pod'=> 'string|required',
            'delivery_address'=> 'required',
            //3
            'description'=> 'required',
            'tariff'=> 'required|min:8|max:10',
            'type_packaging'=> 'required',
            'volume'=> 'numeric|required',
            'weight'=> 'numeric|nullable',
            'cbm'=> 'numeric|required',
            'quantity'=> 'integer|nullable',
            //4
            'lenght'=> 'numeric|nullable',
            'width'=> 'numeric|nullable',
            'height'=> 'numeric|nullable',
            'special_description'=> 'string|nullable',

            //timestamps
            'createdAt'=> 'nullable',
            'createdBy'=> 'nullable',
            'updatedAt'=> 'nullable',
        ]);

        if ($validator->fails()) {

            return $this->sendError('Validation Error.', $validator->errors());

        }
        //1
        $product->customerId = $input['customerId'];
        $product->address = $input['address'];
        $product->rfc = $input['rfc'];
        $product->email = $input['email'];
        $product->phone_number = $input['phone_number'];
        //2
        $product->type_service= $input['type_service'];
        $product->reference= $input['reference'];
        $product->incoterm= $input['incoterm'];
        $product->type_equipment= $input['type_equipment'];
        $product->pickup_address= $input['pickup_address'];
        $product->pol= $input['pol'];
        $product->pod= $input['pod'];
        $product->delivery_address= $input['delivery_address'];
        //3
        $product->description= $input['description'];
        $product->tariff= $input['tariff'];
        $product->type_packaging= $input['type_packaging'];
        $product->volume= $input['volume'];
        $product->weight= $input['weight'];
        $product->cbm= $input['cbm'];
        $product->quantity= $input['quantity'];
        //4
        $product->lenght= $input['lenght'];
        $product->width= $input['width'];
        $product->height= $input['height'];
        $product->special_description= $input['special_description'];
        //timestamps
        $product->createdAt= $input['createdAt'];
        $product->createdBy= $input['createdBy'];
        $product->updatedAt= $input['updatedAt'];

        //guardar
        $product->save();

        return $this->sendResponse(new ClientResource($product), 'Customer updated successfully.');
    }

    public function destroy(Client $product)
    {
        $product->delete();
        return $this->sendResponse([], 'Customer deleted successfully.');
    }

}
