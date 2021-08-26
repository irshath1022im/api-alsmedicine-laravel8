<?php

use App\Http\Controllers\Api\BatchNumberController;
use App\Http\Controllers\Api\ConsumptionControler;
use App\Http\Controllers\Api\ItemController;
use App\Http\Controllers\Api\LocationController;
use App\Http\Controllers\Api\ReceivingItemsController;
use App\Models\BatchNumber;
use Carbon\Carbon;
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


Route::get('itemSearch', [ItemController::class, 'itemSearch']);
Route::get('consumptionSearch', [ConsumptionControler::class, 'seachById']);


Route::get('receivingsByBatchNumber/{batch_number}', [ReceivingItemsController::class, 'Receiving_logs_by_batch_number']);
Route::get('consumptionsByBatchNumber/{batch_number_id}', [ConsumptionControler::class, 'consumptions_by_batch_number']);

Route::get('nearbyexpiry', function (Request $request) {

    // return BatchNumber::where('expiry_date', '>', Carbon::now())->orderBy('expiry_date')->get()->take(5);


    $now = Carbon::now();
    // $monthBefore = Carbon::parse($now)->subMonth();

    $monthBefore = $request->monthBefore;
    $monthAfter = $request->monthAfter;
    $from = $request->from ? $request->from : $now->toDateString();
    $to = $request->to;
    $whereBetween = $from && $to;


    $monthAterDate = $now->addMonth($monthAfter)->toDateString();
    $monthBeforeDate = $now->subMonth($monthBefore+1)->toDateString();

    $result= BatchNumber::
                    //expiry items after / before specific month
                    when($monthAfter, function($query)use($from,$monthAterDate)
                    {
                      return $query->whereBetween('expiry_date', [$from, $monthAterDate]);

                    })
                    ->when($monthBefore, function($query)use($from,$monthBeforeDate)
                    {
                      return $query->whereBetween('expiry_date', [$monthBeforeDate, $from]);

                    })

                    //expiry items between 2 date
                    ->when( $whereBetween, function($query)use($from,$to){
                        return $query->whereBetween('expiry_date', [$from, $to]);
                    })
                    ->orderByDesc('expiry_date')
                    ->paginate(15)
                    ->appends($request->except('page'))


                    ;

        //get wetween 2 date



    // dd($result);
     return $result;

});
