<?php

namespace App\Http\Resources\Receiving;

use App\Http\Resources\ReceivingItems\ReceivingItems;
use Illuminate\Http\Resources\Json\JsonResource;

class ReceivingShow extends JsonResource
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
            'id' => $this->id,
            'date' => $this->date,
            'supplier_name' => $this->supplier->name,
            'po'=>$this->po,
            'invoice_no' => $this->invoice_no,
            'delivery_note' => $this->delivery_note,
            'receiving_items' => ReceivingItems::collection($this->receiving_items)
        ];
    }
}
