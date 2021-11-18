<?php

namespace App\Http\Resources\ReceivingItems;

use Illuminate\Http\Resources\Json\JsonResource;

class ReceivingItems extends JsonResource
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
            'id'=> $this->id,
            'receiving_id' => $this->receiving_id,
            'erp_code' => $this->item->erp_code,
            'item_id' => $this->item_id,
            'item_name' => $this->item->name,
            'batch_number' => $this->batch_number->batch_number,
            'qty' => $this->qty,
            'unit_price' => $this->unit_price,
            'cost' => $this->cost
        ];
    }
}
