<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class BatchNumberShowResource extends JsonResource
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
            'batch_number_id' => $this->id,
            'batch_number' => $this->batch_number,
            'item_id' => $this->item_id,
            // 'initial_qty' => $this->initial_qty,
            'expiry_date' => $this->expiry_date,
            // 'receivings' =>  $this->receiving_items->sum('qty'),
            // 'consumption' => $this->consumptions->sum('qty'),
            'inStock' => ( $this->receiving_items->sum('qty') - $this->consumptions->sum('qty') ) + $this->initial_qty,
            // 'receivings' => $this->receiving_items
        ];
    }
}
