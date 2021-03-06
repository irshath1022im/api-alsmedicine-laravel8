<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\BatchNumberShowResource;
use App\Models\BatchNumber;
use App\Models\ReceivingItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class BatchNumberController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //

        // $result = BatchNumber::with(['receiving_items' => function($query){
        //     return $query->DB::raw()
        // }, 'consumptions'])->get();
        // return $result;

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        // return $request->all();

        $validated = $request->validate([
            'item_id' => 'required',
            'batch_number' => 'required',
            'expiry_date' => 'required',
            'initial_qty' => ''
        ]);

        $result = BatchNumber::create($validated);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($batchNumber)
    {
        //

        $result = BatchNumber::
                    with('receiving_items', 'consumptions')
                    ->where('batch_number', $batchNumber)
                    ->get();

        // return $result;

        return BatchNumberShowResource::collection($result);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }


    Public function minimumQty(Request $request, $qty)
    {
        // return BatchNumber::
        //                 with(['receiving_items' => function($query)
        //                 {
        //                     return $query->selectRaw(DB::raw('sum(qty) as totalReceiving'))
        //                                 ->groupBy('batch_number_id')
        //                                  ->get();
        //                 }])
        //                 ->get()

        //                 ;
            // return $qty;

        // return BatchNumber::
        //             with(['receiving_items' => function($query)
        //             {
        //                 return $query->
        //                              select('receiving_items.batch_number_id')
        //                             ->selectRaw(DB::raw('sum(qty) as totalReceiving'))
        //                             ->groupBy('batch_number_id')
        //                             ;
        //             }, 'consumptions' => function($query)
        //                  {
        //                         return $query->select('batch_number_id')
        //                                     ->selectRaw(DB::raw('sum(qty) as totalConsumed'))
        //                                     ->groupBy('batch_number_id')
        //                                     ;

        //                 }
        //             ])

        //             ->get();

        $collection = BatchNumber::withSum('receiving_items', 'qty')
                            ->withSum('consumptions', 'qty')
                            ->get();




       foreach ($variable as $key => $value) {
            # code...
        }

        return $inStock;





    }



}
