<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ReceivingItem extends Model
{
    use HasFactory;

    public function receiving()
    {
        return $this->belongsTo(Receiving::class);
    }

    public function batch_number()
    {
        return $this->belongsTo(BatchNumber::class);
    }

    public function item()
    {
        return $this->belongsTo(Item::class);
    }



}
