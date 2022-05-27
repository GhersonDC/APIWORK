<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\API\BaseController as BaseController;
use App\Http\Resources\ClientResource;
use App\Models\Client;
use Illuminate\Http\Request;
use Validator;

class ProductController extends BaseController
{

    public function index()
    {
        $products = Client::all();
        return $this->sendResponse(ClientResource::collection($products), 'Customer Instruction Letters retrieved successfully.');
    }

    public function store(Request $request)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required',
        ]);

        if ($validator->fails()) {
            return $this->sendError('Validation Error.', $validator->errors());
        }

        $product = Client::create($input);
        return $this->sendResponse(new ClientResource($product), 'Customer created successfully.');

    }

    public function show($id)
    {

        $product = Client::find($id);

        if (is_null($product)) {

            return $this->sendError('Customer Instruction Letters Not Found.');

        }

        return $this->sendResponse(new ClientResource($product), 'Customer Instruction Letters retrieved successfully.');

    }

    public function update(Request $request, Client $product)
    {
        $input = $request->all();

        $validator = Validator::make($input, [
            'name' => 'required',
            'detail' => 'required',
        ]);

        if ($validator->fails()) {

            return $this->sendError('Validation Error.', $validator->errors());

        }

        $product->name = $input['name'];
        $product->detail = $input['detail'];
        $product->save();

        return $this->sendResponse(new ClientResource($product), 'Customer updated successfully.');
    }

    public function destroy(Client $product)
    {
        $product->delete();
        return $this->sendResponse([], 'Customer deleted successfully.');
    }

}
