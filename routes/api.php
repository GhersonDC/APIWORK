<?php

use App\Http\Controllers\API\ProductController;
use App\Http\Controllers\API\RegisterController;
use App\Http\Controllers\API\CatalogController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

Route::post('register', [RegisterController::class, 'register']); //REGISTRO
Route::post('login', [RegisterController::class, 'login']); //LOGIN

Route::middleware('auth:api')->group(function () {
    Route::resource('clients', ProductController::class); //GETALL
});

//catalogos
Route::get('ports',[CatalogController::class,'ports']);
Route::get('location',[CatalogController::class,'location']);
Route::get('type_packaging',[CatalogController::class,'type_packaging']);
Route::get('type_equipment',[CatalogController::class,'type_equipment']);
Route::get('type_service',[CatalogController::class,'type_service']);