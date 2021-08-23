<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ReceivingShowResource extends JsonResource
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
            'date' => $this->receiving->date,
            'batch_number' => $this->batch_number,
            'qty'=> $this->qty,
            'expiry_date' => $this->expiry_date
        ];
    }
}
