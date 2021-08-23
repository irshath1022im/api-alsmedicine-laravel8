<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use App\Http\Resources\BatchNumberShowResource;

class ItemShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        // return parent::toArray($request);
        return [
            'item_id' => $this->id,
            'item_name' => $this->name,
            'batch_numbers' => BatchNumberShowResource::collection($this->batch_numbers),
            // 'item_total_receiving' => $this->receivings->sum('qty'),
            // 'item_receiving' => [
            //         'id' => $this->receivings->id
            // ],
            // 'item_consumption' => $this->consumptions->sum('qty'),
            // 'stock_in_hand' => $this->receivings->sum('qty') - $this->consumptions->sum('qty'),
        ];
    }
}
