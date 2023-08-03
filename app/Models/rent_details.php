<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rent_details extends Model
{
    use HasFactory;
    protected $fillable = [
        'car_id',
        'customer_id',
    ];
}

