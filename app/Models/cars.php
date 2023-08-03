<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cars extends Model
{
    use HasFactory;
    public function customer()
    {
        
        return $this->belongsTo(customers::class);
        
    }
    public $timestamps = true;
}
