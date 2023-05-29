<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ContentFood extends Model
{
    use HasFactory;
    protected $table = 'contentfoods';
    protected $primaryKey = 'id';

    public $timestamps = false;
}
