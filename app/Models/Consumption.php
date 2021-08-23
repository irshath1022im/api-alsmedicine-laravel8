<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consumption extends Model
{
    use HasFactory;

    protected $fillable = ['date', 'batch_number_id', 'item_id', 'qty', 'location_id','user_id'];

    public function item()
    {
        return $this->belongsTo(Item::class);
    }

    public function batch_number()
    {
        return $this->belongsTo(BatchNumber::class);
    }

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

}
