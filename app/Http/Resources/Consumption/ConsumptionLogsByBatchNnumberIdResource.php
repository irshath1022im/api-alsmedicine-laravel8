<?php

namespace App\Http\Resources\Consumption;

use Illuminate\Http\Resources\Json\JsonResource;

class ConsumptionLogsByBatchNnumberIdResource extends JsonResource
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

        return[
            'line_id' => $this->id,
            'date' => $this->date,
            'item_name' => $this->item->name,
            'batch_number' => $this->batch_number->batch_number,
            'qty' => $this->qty,
            'location' => $this->location->location,
            'user' => $this->user->name
        ];
    }
}
