<?php

use App\Http\Controllers\Api\BatchNumberController;
use App\Http\Controllers\Api\ConsumptionControler;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\ReceivingItemsController;
use Illuminate\Http\Request;
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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::resource('items', ItemController::class);
Route::resource('receiving_items', ReceivingItemsController::class);
Route::resource('batch_numbers', BatchNumberController::class);
Route::resource('locations', LocationController::class);
Route::resource('consumption', ConsumptionControler::class);


Route::get('receivingsByBatchNumber/{batch_number}', [ReceivingItemsController::class, 'Receiving_logs_by_batch_number']);
Route::get('consumptionsByBatchNumber/{batch_number_id}', [ConsumptionControler::class, 'consumptions_by_batch_number']);
