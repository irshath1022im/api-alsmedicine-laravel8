<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ItemIndexResource extends JsonResource
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
            'item_name' => $this->name,
            'erp_code' => $this->erp_code,
            'batch_numbers' => BatchNumberShowResource::collection($this->batch_numbers)
        ];
    }
}
