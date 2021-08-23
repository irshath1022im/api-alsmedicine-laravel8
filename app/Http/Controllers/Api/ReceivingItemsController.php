<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ReceivingLogsByBatchNnumberResource;
use App\Http\Resources\ReceivingShowResource;
use App\Models\ReceivingItem;
use Illuminate\Http\Request;

class ReceivingItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //

        $result = ReceivingItem::with('receiving')
                                    ->where('item_id', $id)
                                ->get();

                                // return $result;
                                // dd($result);
                    return ReceivingShowResource::collection($result);
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

    public function Receiving_logs_by_batch_number($id)
    {
        $result = ReceivingItem::with('batch_number', 'receiving', 'item')
                            ->where('batch_number_id', $id)->get();

        return ReceivingLogsByBatchNnumberResource::collection($result);
    }



}
