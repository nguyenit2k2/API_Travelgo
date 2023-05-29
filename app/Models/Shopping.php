<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Shopping extends Model
{
    use HasFactory;
    protected $table = 'shoppings';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
