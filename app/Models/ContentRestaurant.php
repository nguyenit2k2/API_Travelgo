<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentRestaurant extends Model
{
    use HasFactory;
    protected $table = 'contentrestaurants';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
