<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\BookingFlight;

class Flight extends Model
{
    use HasFactory;

    protected $table = 'flight';
    
    protected $primaryKey = 'id';

    public $timestamps = false;
    public function bookingFlight()
    {
        return $this->hasMany(BookingFlight::class);
    }
}
