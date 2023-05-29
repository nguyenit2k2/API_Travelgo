<?php

namespace App\Models;
use App\Models\Property;
use App\Models\BookingCar;
use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
    protected $fillable = [
        'place', 'image', 'shortDescription',
    ];

    public function properties()
    {
        return $this->hasMany(Property::class);
    }
    public function bookingCar()
    {
        return $this->hasMany(BookingCar::class);
    }
}