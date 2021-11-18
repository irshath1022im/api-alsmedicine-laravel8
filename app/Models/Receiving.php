<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Receiving extends Model
{
    use HasFactory;

    protected $fillable = ['date','po','invoice_no','delivery_note','supplier_id','remark'];

    public function supplier()
    {
        return $this->belongsTo(Supplier::class);
    }

    public function receiving_items()
    {
        return $this->hasMany(ReceivingItem::class);
    }

}
