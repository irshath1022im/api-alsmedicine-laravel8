<?php

namespace App\Http\Resources\Consumption;

use App\Http\Resources\BatchNumberShowResource;
use App\Http\Resources\ItemIndexResource;
use Illuminate\Http\Resources\Json\JsonResource;

class ConsumptionIndexResource extends JsonResource
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
        // date,item_name,batch_number,qty,location
        return[
            'date' => $this->date,
            'batch_number_id' => $this->batch_number_id,
            'batch_number'=> $this->batch_number->batch_number,
            'item_name' => $this->item->name,
            'location' => $this->location->location,
            'qty' => $this->qty,
            'erp_code' => $this->item->erp_code,
        ];
    }
}
