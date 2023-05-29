<?php

namespace App\Models;
use App\Models\Property;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    protected $fillable = [
        'property_id', 'name', 'size', 'refundable', 'payment', 'bed',
    ];

    public function property()
    {
        return $this->belongsTo(Property::class);
    }
}