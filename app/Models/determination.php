<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class determination extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'food_id',
        'quntity',
        'price',
        'note',
         'total_price',

        
    ];
}
