<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BatchNumber extends Model
{
    use HasFactory;

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function receiving_items()
    {
        return $this->hasMany(ReceivingItem::class);
    }

    public function consumptions()
    {
        return $this->hasMany(Consumption::class);
    }

}