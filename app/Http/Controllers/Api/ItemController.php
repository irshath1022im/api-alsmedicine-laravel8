<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\ItemIndexResource;
use App\Http\Resources\ItemShowResource;
use App\Http\Resources\Search\ItemSearchResource;
use App\Models\BatchNumber;
use App\Models\Item;
use Illuminate\Http\Request;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //

        $searchByItemName = $request->item_name ;
        // $orderByExpiryDateDesc = $request->orderByExpiryDateDesc;



        $result = Item::with(['batch_numbers'])
                    ->when($searchByItemName, function($result)use($searchByItemName){
                                return $result->where('name', 'like', $searchByItemName. '%');
                    })
                    ->orderByDesc('id')
                    ->paginate(10)
                    ;

        // $collecction = $result->when($searchByItemName, function($result)use($searchByItemName){
        //     return $result->where('name', 'like', '%' .$searchByItemName);
        // });



        return ItemIndexResource::collection($result);
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
        $validated = $request->validate([
            'name' => 'required',
            'category_id' => 'required',
            'thumbnail' => '',
            'erp_code' => 'required',
            'remark' => ''
        ]);

        $result = Item::create($validated);

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

        $result = Item::with('batch_numbers')->findOrFail($id);

        // $result = BatchNumber::with('receiving_items')->where('item_id', $id)->get();

        // dd($result);
        // return $result;

        return new ItemIndexResource($result);

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

    public function itemSearch(Request $request)
    {

        $searchByItemName = $request->itemName;
        $result = Item::
                    where('name', 'like', '%'.$searchByItemName. '%')
                    ->orWhere('erp_code', 'like', '%' .$searchByItemName.'%')
                    ->get()
                    ->take(5)
                    ;

        // return $result;

        return ItemSearchResource::collection($result);

        // return $request->all();
    }
}
