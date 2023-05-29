<?php

namespace App\Models;
use App\Models\Location;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\RentCar;
class BookingCar extends Model
{
    use HasFactory;
    protected $table = 'bookingcar';
    protected $primaryKey = 'id';

    public $timestamps = false;

    public function location()
    {
        return $this->belongsTo(Location::class);
    }
    public function rentCar()
    {
        return $this->hasMany(RentCar::class);
    }
}
