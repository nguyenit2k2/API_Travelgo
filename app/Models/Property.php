<?php

namespace App\Models;
use App\Models\Location;
use App\Models\Photo;
use App\Models\Room;
use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'location_id', 'name', 'image', 'rating', 'address', 'oldPrice', 'newPrice', 'latitude', 'longitude',
    ];

    public function location()
    {
        return $this->belongsTo(Location::class);
    }

    public function photos()
    {
        return $this->hasMany(Photo::class);
    }

    public function rooms()
    {
        return $this->hasMany(Room::class);
    }
}