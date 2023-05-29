<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HomeStay extends Model
{
    use HasFactory;
    protected $table = 'homestays';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
