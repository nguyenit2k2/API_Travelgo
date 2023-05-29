<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Flight;
class BookingFlight extends Model
{
    use HasFactory;
    protected $table = 'bookflight';
    protected $primaryKey = 'id';

    public $timestamps = false;
    public function flight()
    {
        return $this->belongsTo(Flight::class);
    }
}
