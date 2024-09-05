<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DietSystem extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'explanation',
       // 'foods',
        'food_id',
    ];

    public function foods()
    {
        return $this->hasMany(Food::class);
    }
    
}
