<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Item extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'thumbnail', 'erp_code', 'remark', 'category_id'];

    public function receivings()
    {
        return $this->hasMany(ReceivingItem::class);
    }

    public function consumptions()
    {
        return $this->hasMany(Consumption::class);
    }

    public function batch_numbers()
    {
        return $this->hasMany(BatchNumber::class);
    }

    public function receiving_items_batch_number()
    {
        return $this->hasManyThrough(ReceivingItem::class, BatchNumber::class, 'id', 'batch_number_id', 'id' );
    }


}
