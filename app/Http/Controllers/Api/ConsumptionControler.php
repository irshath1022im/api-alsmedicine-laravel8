<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\Consumption\ConsumptionIndexResource;
use App\Http\Resources\Consumption\ConsumptionLogsByBatchNnumberIdResource;
use App\Http\Resources\Search\ConsumptionSearchResource;
use App\Models\Consumption;
use Illuminate\Http\Request;

class ConsumptionControler extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //
        $item_id = $request->item_id;

        $result = Consumption::with(['item','location', 'batch_number'])
                                ->when($item_id, function($query)use($item_id)
                                {
                                    return $query->where('item_id', $item_id);
                                })
                                ->orderByDesc('date')
                                ->paginate(5);

        return ConsumptionIndexResource::collection($result);


    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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

        // return $request->all();

        $request->validate([
            'date' => 'required',
           'location_id' => 'required|max:1',
           'item_id' => 'required',
           'batch_number_id' => 'required',
           'qty' => 'required|max:1',
           'user_id'=>'required'
        ]);

        $data = [
           'date' => $request->date,
           'location_id' => $request->location_id,
           'item_id' => $request->item_id,
           'batch_number_id' => $request->batch_number_id,
           'qty' => $request->qty,
           'user_id'=>$request->user_id
        ];

        $result = Consumption::create($data);

        return $result;

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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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


    public function consumptions_by_batch_number($batch_number_id)
    {
        $result = Consumption::with('item', 'batch_number', 'location', 'user')
                                ->where('batch_number_id', $batch_number_id)
                                ->get();

        return ConsumptionLogsByBatchNnumberIdResource::collection($result);

    }

    public function seachById(Request $request)
    {

        $serachByItemId = $request->item_id;
        $result =Consumption::
                   where('item_id', $serachByItemId)
                   ->get();

        return ConsumptionSearchResource::collection($result);
    }


}
