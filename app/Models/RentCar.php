<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookingCar;
class RentCar extends Model
{
    use HasFactory;
    protected $table = 'rentcar';
    protected $primaryKey = 'id';

    public $timestamps = false;
    public function bookingCar()
    {
        return $this->belongsTo(BookingCar::class);
    }
}
