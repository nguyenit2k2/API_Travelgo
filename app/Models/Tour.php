<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tour extends Model
{
    use HasFactory;
    protected $table = "tours";
    protected $primaryKey = 'id';
    protected $fillable = [
        'name',
        'first_name',
        'last_name',
        'adults',
        'children',
        'start_date',
        'end_date',
        'rooms',
        'old_price',
        'new_price',
        'rating',
    ];
    public $timestamps = false;
}
