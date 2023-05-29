<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentPlace extends Model
{
    use HasFactory;
    protected $table = 'contentplaces';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
